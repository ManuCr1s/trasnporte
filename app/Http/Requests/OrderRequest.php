<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => ['required','string'],
            'lastname'=> ['required','string'],
            'rate' => ['not_in:0'],
            'period' => ['required'],
            'description' => ['required','string'],
        ];
    }
    public function messages(): array
    {
        return [
            'dni.required' => 'Ingrese numero de DNI',
            'dni.size' => 'Ingrese numero de DNI valido',
            'name.required' => 'Ingrese nombres',
            'name.string' => 'Ingrese nombres validos',
            'lastname.required' => 'Ingrese apellidos',
            'lastname.string' => 'Ingrese apellidos validos',
            'rate.not_in' => 'Seleccione taza de pago',
            'period.required' => 'Ingrese periodo',
            'description.required' => 'Ingrese descripcion de Orden de Pago',
            'description.string' => 'Ingrese descripcion de Orden de Pago valido'
        ];
    }
}
