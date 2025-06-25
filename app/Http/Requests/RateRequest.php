<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RateRequest extends FormRequest
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
            'name' => ['required'],
            'amount' => ['required','regex:/^\d+(\.\d{1,2})?$/']
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Ingrese nombre de Taza',
            'amount.required' => 'Ingrese monto de Taza',
            'amount.regex' => 'Ingrese numero con dos decimales Ejem: ***.00'
        ];
    }
}
