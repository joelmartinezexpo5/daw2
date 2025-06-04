<?php

declare(strict_types = 1);

namespace App\Rules;

abstract class AbstractRule{
    protected string $message;

    public function __construct(string $message=''){
        $this->message=$message;
    }

    public function getMessage():string{
        return $this->message;
    }

    abstract public function validate(mixed $value):bool;
}