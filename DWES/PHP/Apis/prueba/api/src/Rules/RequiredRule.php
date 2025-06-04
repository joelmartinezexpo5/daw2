<?php

declare(strict_types = 1);

namespace App\Rules;

final class RequiredRule extends AbstractRule{
    
    public function validate(mixed $value):bool{
        return !empty($value);
    }

}