<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeriodRequest extends FormRequest
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
            'name' => ['required','size:4','unique:periods'],
            'description' => ['required','string']
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Ingrese un año para registrar periodo',
            'name.size' => 'Ingrese 4 digitos par ael año',
            'description.required' => 'Ingrese una descirpcion de periodo',
            'description.string' => 'Ingrese una descripcion valida',
            'name.unique' => 'El año ingresado ya esta registrado'
        ];
    }
}
