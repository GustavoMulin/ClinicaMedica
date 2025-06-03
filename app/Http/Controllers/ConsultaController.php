<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Http\Requests\StoreConsultaRequest;
use App\Http\Requests\UpdateConsultaRequest;

use function Pest\Laravel\json;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Consulta::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsultaRequest $request)
    {
        try {
            $consulta = Consulta::create($request->validated());
            return response()->json([
                'message' => 'Consulta cadastrada com sucesso.',
                'data' => $consulta
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao cadastrar consulta.',
                'erro' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Consulta $consulta)
    {
        try {
            $consulta = Consulta::with(['pacientes', 'medicos'])->first();

            if(!$consulta) {
                return response()->json([
                    'message' => 'Consulta encontrada com sucesso.',
                    'data' => $consulta
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar o cadastro.',
                'erro' => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsultaRequest $request, Consulta $consulta)
    {
        $consulta->update($request->validated());

        return response()->json([
            'message' => 'Paciete atualizado com sucesso.',
            'data' => $consulta
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $consulta = Consulta::where('id', $id)->first();

            if (!$consulta) {
                return response()->json([
                    'message' => 'Consulta não encontrada.'
                ]);
            }

            $consulta->delete();

            return response()->json([
                'message' => 'Consulta deletada com sucesso.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar a consulta.',
                'erro' => $e->getMessage()
            ]);
        }
    }
}
