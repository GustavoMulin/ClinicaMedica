<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicoRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'especialidade' => 'required|string|max:100',
            'crm' => 'required|unique',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|unique'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O nome deve ser texto.',

            'especialidade.required' => 'A especialidade é obrigatório.',
            'especialidae.string' => 'A especialidade deve ser um texto.',

            'crm.required' => 'O campo CRM é obrigatório.',
            'crm.unique' => 'Este CRM já está cadastrado.',
            
            'telefone.required' => 'O campo telefone é obrigatório',
            
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido!',
            'email.unique' => 'Este e-mail já está cadastrado.'
        ];
    }
}
