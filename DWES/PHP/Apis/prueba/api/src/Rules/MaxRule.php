<?php
declare(strict_types=1);

namespace App\Rules;

final class MaxRule extends AbstractRule
{

    private int $length;


   public function __construct(int $length,string $message=''){
        parent::__construct($message);
            $this->length= $length;
    }

    
    public function validate(mixed $value): bool
    {
        return strlen($value)<=$this->length?true:false;
    }

}