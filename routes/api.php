<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('pacientes', PacienteController::class);
    Route::apiResource('medicos', MedicoController::class);
    Route::apiResource('consultas', ConsultaController::class);
});