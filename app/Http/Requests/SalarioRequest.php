<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalarioRequest extends FormRequest
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
            'salario_base' => 'required|numeric',
            'dias_trabajados' => 'required|integer|min:1',
            'total_ventas' => 'required|integer|min:0'
        ];
    }

    public function messages(): array
    {
        return [
            'salario_base.required' => 'El salario base es requerido.',
            'salario_base.numeric' => 'El salario base debe ser un número.',
            'dias_trabajados.required' => 'Los días trabajados son requeridos.',
            'dias_trabajados.integer' => 'Los días trabajados deben ser un número entero.',
            'dias_trabajados.min' => 'Los días trabajados deben ser mayor a cero.',
            'total_ventas.required' => 'El valor de las ventas es requerido.',
            'total_ventas.integer' => 'El valor de las ventas debe ser un número entero.',
            'total_ventas.min' => 'El valor de las ventas debe ser mayor o igual a cero.'
        ];
    }

}
