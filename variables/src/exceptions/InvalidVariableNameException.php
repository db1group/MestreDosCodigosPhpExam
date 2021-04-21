<?php

namespace App\variables\src\exceptions;

use JetBrains\PhpStorm\Pure;

class InvalidVariableNameException extends \Exception
{
    #[Pure] public function __construct(string $variableName)
    {
        parent::__construct("Invalid Variable name: $variableName");
    }

}