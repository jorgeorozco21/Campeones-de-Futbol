<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;

    protected $table = "torneos";

    protected $fillable = [
        "ID_Competicion",
        "Edicion",
        "ID_Equipo"
    ];

    public function competicion() {
        return $this->belongsTo(Competicion::class, 'ID_Competicion');
    }

    public function equipo() {
        return $this->belongsTo(Equipo::class, 'ID_Equipo');
    }

    public function resultadosLiga() {
        return $this->hasMany(ResultadoLiga::class, 'ID_Torneo');
    }

    public function resultadosGrupos() {
        return $this->hasMany(ResultadoGrupo::class, 'ID_Torneo');
    }

    public function fasesEliminacion() {
        return $this->hasMany(FaseEliminacion::class, 'ID_Torneo');
    }
}
