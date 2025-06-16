<?php

declare(strict_types = 1);

namespace Examen0701\Request;

use Examen0701\Rules\AbstractRule;

abstract class AbstractRequest{

    //array de reglas contiene una clave por ejemplo el nombre,la descripcion 
    // array de nuestras reglas definidas required, min

    /**
     * @var array<string, array<AbstractRule>>
     */
    protected array $rules=[];

    // array de mensajes contiene un clave por ejemplo el nombre, la descripción
    // y un array de los mensajes por cada clave

    /**
     * @var array<string, array<string>>
     */

    protected array $messages=[];

    

    public function __construct(){
        $this->rules=$this->rules();
        $this->respond();
    }
    
    /**
     *  $return array<string,array<AbstracRule>>
     */
    abstract protected function rules():array;

    /**
     * @param array<string, mixed> $data
     */
    public function validate(array $data): bool
    {
        $this->messages = [];

        foreach ($this->rules as $field => $rules) {
            foreach ($rules as $rule) {
                if (! $rule->validate($data[$field])) {
                    if (!isset($this->messages[$field])) {
                        $this->messages[$field][] = $rule->getMessage();
                    }
                }
            }
        }

        return empty($this->messages);
    }

    /**
     * @return array<string, array<string>>
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @return array<string, mixed>
     */
    public function validated(): array
    {
        $data = [];

        foreach ($this->rules as $field => $rules) {
            $data[$field] = input($field);
        }

        return $data;
    }

    protected function respond(): void
    {
        if ($this->validate(data: input()->all(array_keys($this->rules))) === false) {
            $this->error();
        }
    }

    protected function error(): void
    {
        response()
            ->httpCode(code: 422)
            ->json(value: [
                'status' => 'error',
                'errors' => $this->getMessages(),
            ]);
    }

}
?>