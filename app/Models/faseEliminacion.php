<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faseEliminacion extends Model
{
    use HasFactory;

    protected $table = "fases_de_eliminacion";

    protected $fillable = [
        "ID_Equipo1",
        "ID_Equipo2",
        "Tipo",
        "ID_Torneo",
        "ID_Resultado",
        "Fase",
        "Llave"
    ];

    public function equipo1() {
        return $this->belongsTo(Equipo::class, 'ID_Equipo1');
    }

    public function equipo2() {
        return $this->belongsTo(Equipo::class, 'ID_Equipo2');
    }

    public function torneo() {
        return $this->belongsTo(Torneo::class, 'ID_Torneo');
    }

    public function resultadoEliminacion() {
        return $this->belongsTo(ResultadoEliminacion::class, 'ID_Resultado');
    }
}
