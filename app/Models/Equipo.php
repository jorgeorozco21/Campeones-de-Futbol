<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = "equipos";

    protected $fillable = [
        "Nombre",
        "Escudo",
        "Colores"
    ];

    public function torneos() {
        return $this->hasMany(Torneo::class, 'ID_Equipo');
    }

    public function resultadosLiga() {
        return $this->hasMany(ResultadoLiga::class, 'ID_Equipo');
    }

    public function resultadosGrupos() {
        return $this->hasMany(ResultadoGrupo::class, 'ID_Equipo');
    }

    public function fasesEliminacion1() {
        return $this->hasMany(FaseEliminacion::class, 'ID_Equipo1');
    }

    public function fasesEliminacion2() {
        return $this->hasMany(FaseEliminacion::class, 'ID_Equipo2');
    }

}
