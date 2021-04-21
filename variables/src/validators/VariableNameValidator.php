<?php

namespace App\variables\src\validators;

use App\variables\src\exceptions\InvalidVariableNameException;

final class VariableNameValidator
{
    private const VARIABLE_PATTERN_IN_REGULAR_EXPRESSION = '/\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)$/';

    /**
     * @param string $variableName
     * @throws InvalidVariableNameException
     */
    public static final function validate(string $variableName): void
    {
        if (!preg_match_all(self::VARIABLE_PATTERN_IN_REGULAR_EXPRESSION, $variableName)) {
            throw new InvalidVariableNameException($variableName);
        }
    }
}