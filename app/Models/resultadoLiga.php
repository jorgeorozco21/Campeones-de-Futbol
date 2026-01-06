<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resultadoLiga extends Model
{
    use HasFactory;

    protected $table = "resultados_liga";

    protected $fillable = [
        "ID_Equipo",
        "ID_Torneo",
        "ID_Resultado"
    ];

    public function equipo() {
        return $this->belongsTo(Equipo::class, 'ID_Equipo');
    }

    public function torneo() {
        return $this->belongsTo(Torneo::class, 'ID_Torneo');
    }

    public function resultado() {
        return $this->belongsTo(Resultado::class, 'ID_Resultados');
    }
}
