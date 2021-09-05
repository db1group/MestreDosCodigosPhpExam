<?php

namespace MestreCodigo\Variable;

class Variable {

    function validateName($name): bool {
        if ($name == '$this') {
            return false;
        }
    
        $pattern = '/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/'; 
        if (preg_match($pattern, $name, $match)){
            return ($name == '$' . $match[0]);
        } else {
            return false;
        }
    }
}
