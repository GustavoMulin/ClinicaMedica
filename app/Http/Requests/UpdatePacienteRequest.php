<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePacienteRequest extends FormRequest
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
            'idade' => 'nullable|integer|min:0',
            'telefone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'endereco' => 'nullable|string|max:255',
            'data_cadastro' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto.',

            'idade.required' => 'O campo idade é obrigatório.',
            'idade.integer' => 'A idade deve ser um número inteiro.',
            
            'telefone.required' => 'O campo telefone é obrigatório.',
            
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            'endereco.required' => 'o campo endereço é obrigatório.',
        ];
    }
}
