<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Paciente::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePacienteRequest $request)
    {
        try {
            $paciente = Paciente::create($request->validated());
            return response()->json([
                'message' => 'Paciente cadastrado com sucesso.',
                'data' => $paciente
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao cadastrar paciente',
                'erro' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $paciente = Paciente::with('pacientes')->where('id', $id)->first();

            if(!$paciente) {
                return response()->json([
                    'message' => 'Paciente encontrado com sucesso',
                    'data' => $paciente
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar o paciente',
                'erro' => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        $paciente->update($request->validated());

        return response()->json([
            'message' => 'Paciente atualizado com sucesso.',
            'data' => $paciente
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
        $paciente = Paciente::where('id', $id)->first();

        if (!$paciente) {
            return response()->json([
                'message' => 'Paciente não encontrado.'
            ], 404);
        }

        $paciente->delete();

        return response()->json([
            'message' => 'Paciente deletado com sucesso!'
        ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar paciente.',
                'erro' => $e->getMessage()
            ], 500);
        }
    }
}
