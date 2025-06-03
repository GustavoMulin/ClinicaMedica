<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Medico::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicoRequest $request)
    {
        try {
            $medico = Medico::create($request->validated());
            return response()->json([
                'message' => 'Médico cadastrado com sucesso.',
                'data' => $medico
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao cadastrar o médico',
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
            $medico = Medico::with('medicos')->where('id', $id)->first();

            if(!$medico) {
                return response()->json([
                    'message' => 'Medico encontrado com sucesso.',
                    'data' => $medico
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar o médico.',
                'erro' => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicoRequest $request, Medico $medico)
    {
        $medico->update($request->validated());

        return response()->json([
            'message' => 'Paciente atualizado com sucesso.',
            'data' => $medico
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $medico = Medico::where('id', $id)->first();

            if(!$medico) {
                return response()->json([
                    'message' => 'Paciente não encontrado.'
                ]);
            }

            $medico->delete();

            return response()->json([
                'message' => 'Paciente deletado com sucesso.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erri ao deletar paciente.',
                'erro' => $e->getMessage()
            ]);
        }
    }
}
