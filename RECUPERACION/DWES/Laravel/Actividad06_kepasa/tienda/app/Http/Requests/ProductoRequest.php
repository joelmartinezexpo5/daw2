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
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'required|string|max:1000',
            'familia_id' => 'required|exists:familias,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
