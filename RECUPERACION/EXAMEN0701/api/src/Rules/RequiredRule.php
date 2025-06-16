<?php

declare(strict_types = 1);

namespace Examen0701\Rules;

final class RequiredRule extends AbstractRule{
    
    public function validate(mixed $value):bool{
        return !empty($value);
    }

}