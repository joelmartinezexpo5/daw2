<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearAnimalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'especie' => 'required|min:3',
            'peso' => 'required',
            'altura' => 'required',
            'fechaNacimiento' => 'required',
            'imagen' => 'required|image|mimes:png,jpg,jpeg,svg'
        ];
    }

    public function messages()
    {
        return [
            'especie.required' => 'La especie es obligatoria',
            'especie.min' => 'La especie debe tener al menos 4 digitos',
            'peso.required' => 'El peso es obligatorio',
            'altura.required' => 'La altura es obligatoria',
            'fechaNacimiento.required' => 'La fecha de nacimiento es obligatoria',
            'imagen.required' => 'La imagen es obligatoria',
            'imagen.mimes' => 'La imagen debe ser jpeg, png, jpg o svg'
        ];
    }
}
