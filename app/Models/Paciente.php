<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    /** @use HasFactory<\Database\Factories\PacienteFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'idade',
        'telefone',
        'email',
        'endereco'
    ];

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}
