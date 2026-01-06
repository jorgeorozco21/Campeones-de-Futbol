<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resultadoEliminacion extends Model
{
    use HasFactory;

    protected $table = "resultados_eliminacion";

    protected $fillable = [
        "Resultado1",
        "Resultado2",
        "Resultado3"
    ];

    public function fasesEliminacion() {
        return $this->hasMany(FaseEliminacion::class, 'ID_Resultado');
    }
}
