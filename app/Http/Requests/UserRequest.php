<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'dni' => ['required','size:8'],
            'nombres' => ['required','string'],
            'apellidos' => ['required','string'],
            'email' => ['required','email']
        ];
    }
    public function messages(): array
    {
        return [
            'dni.required' => 'Ingrese Dni del usuario',
            'dni.size' => 'Ingrese 8 digitos',
            'nombres.required' => 'Ingrese nombre de usuario',
            'nombres.string' => 'Ingrese cadena de texto para Nombre',
            'apellidos.required' => 'Ingrese apellido de usuario',
            'apellidos.string' => 'Ingrese cadena de texto para Apellido',
            'email.required' => 'Ingrese un correo electronico',
            'email.email' => 'Ingrese email valido'
        ];
    }
}
