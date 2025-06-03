<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    /** @use HasFactory<\Database\Factories\MedicoFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'especialidade',
        'crm',
        'telefone',
        'email'
    ];

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}
