<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProductoRequest extends FormRequest
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
            'nombre' => 'required|string|min:4',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'required|string|max:1000',
            'familia_id' => 'required|exists:familias,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg|max:2048',
        ];
    }

    public function messages()
    {
        return[
            'nombre.required' => 'el nombre es obligatorio',
            'nombre.min' => 'el nombre debe tener al menos 4 letras',
            'precio.required' => 'el precio es obligatorio',
            'precio.min' => 'el precio debe ser mayor que cero',
            'decripcion.required' => 'la descripcion es obligatoria',
            'descripcion.max' => 'la descripcion no debe sobrepasar los 1000 caracteres',
            'imagen.mimes' => 'la imagen deb estar en formato jpg o jpeg',
        ];
    }
}
