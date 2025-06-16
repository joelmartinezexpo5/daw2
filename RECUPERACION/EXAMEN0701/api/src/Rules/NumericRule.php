<?php
declare(strict_types = 1);

namespace Examen0701\Rules;

use Illuminate\Validation\Rules\Numeric;

final class NumericRule extends AbstractRule{
    
   

    public function __construct(string $message=''){
        parent::__construct($message);
    }

    public function validate(mixed $value):bool{
        return is_numeric($value);
    }

}