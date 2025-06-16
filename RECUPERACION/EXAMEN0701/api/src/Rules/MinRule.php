<?php
declare(strict_types=1);

namespace Examen0701\Rules;

final class MinRule extends AbstractRule
{

    private int $length;


   public function __construct(int $length,string $message=''){
        parent::__construct($message);
            $this->length = $length;
    }

    
    public function validate(mixed $value): bool
{
    if (!is_string($value) && !is_numeric($value)) {
        return false;
    }

    return mb_strlen((string)$value) >= $this->length;
}


}