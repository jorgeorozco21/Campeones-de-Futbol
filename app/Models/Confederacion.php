<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confederacion extends Model
{
    use HasFactory;

    protected $table = 'confederaciones';

    protected $fillable = [
        "Nombre",
        "Logo",
        "Descripcion"
    ];

    public function competiciones() {
        return $this->hasMany(Competicion::class, 'ID_Confederacion');
    }
}
