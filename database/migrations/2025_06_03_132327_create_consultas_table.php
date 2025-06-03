<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();            
            $table->date('data');
            $table->time('horario');
            $table->string('tipo', 30)->nullable();
            $table->decimal('valor', 8, 2)->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();

            $table->foreignId('paciente_id')
            ->constrained('pacientes')
            ->onDelete('cascade');

            $table->foreignId('medico_id')
            ->constrained('medicos')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
