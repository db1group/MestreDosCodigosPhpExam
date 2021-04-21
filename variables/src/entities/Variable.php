<?php

namespace App\variables\src\entities;

use App\variables\src\exceptions\InvalidVariableNameException;
use App\variables\src\validators\VariableNameValidator;

final class Variable
{
    /**
     * Variable constructor.
     * @param string $variableName
     * @throws InvalidVariableNameException
     */
    public function __construct(private string $variableName)
    {
        VariableNameValidator::validate($variableName);
    }

    /**
     * @return string
     */
    public function getVariableName(): string
    {
        return $this->variableName;
    }
}