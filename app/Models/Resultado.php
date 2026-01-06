<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $table = "resultados";

    protected $fillable = [
        "Ganados",
        "Perdidos",
        "Empates",
        "GA",
        "GC",
        "DG",
        "Puntos",
        "Clasificacion"
    ];

    public function resultadosLiga() {
        return $this->hasMany(ResultadoLiga::class, 'ID_Resultados');
    }

    public function resultadosGrupos() {
        return $this->hasMany(ResultadoGrupo::class, 'ID_Resultados');
    }
}
