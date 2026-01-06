<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competicion extends Model
{
    use HasFactory;

    protected $table = "competiciones";

    protected $fillable = [
        "Nombre",
        "Logo",
        "Descripcion",
        "ID_Pais",
        "Tipo",
        "ID_Confederacion"
    ];

    public function pais() {
        return $this->belongsTo(Pais::class, 'ID_Pais');
    }

    public function confederacion() {
        return $this->belongsTo(Confederacion::class, 'ID_Confederacion');
    }

    public function torneos() {
        return $this->hasMany(Torneo::class, 'ID_Competicion');
    }

}
