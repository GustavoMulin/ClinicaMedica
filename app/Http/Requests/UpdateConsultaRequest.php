<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsultaRequest extends FormRequest
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
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'data' => 'required|date',
            'horario' => 'required|date_format:H:i',
            'tipo' => 'nullable|string|max:50',
            'valor' => 'required|numeric|min:0',
            'observacoes' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'paciente_id.required' => 'O campo paciente é obrigatório.',
            'paciente_id.esxists' => 'O paciente informado não existe na base de dados.',

            'medico_id.required' => 'O campo médico é obrigatório.',
            'medico_id.exists' => 'O médico informado não existe na base de dados.',

            'data_required' => 'O campo data da consulta é obrigatório.',
            'data.date' => 'A data informada não é válida.',

            'horario.required' => 'O campo horário é obrigatório.',
            'horario.date_format' => 'O horário deve estar no formata HH:MM (Ex: 14:30).',

            'tipo.string' => 'O tipo da consulta deve ser um texto.',
            
            'valor.required' => 'O campo valor é obrigatório.',
            'valor.numeric' => 'O valor deve ser um número.',
            'valor.min' => 'O valor não pode ser negativo.',

            'observacoes.string' => 'As observações devem ser um texto'
        ];
    }
}
