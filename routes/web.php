<?php

use App\Http\Controllers\CompeticionController;
use App\Http\Controllers\ConfederacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\ResultadoGrupoController;
use App\Http\Controllers\ResultadoLigaController;
use App\Http\Controllers\TorneoController;

Route::get('/', function () {
    return view('welcome');
});

// Creacion de la Ruta para el crud
Route::get('/Crud', function () {
    return view('Crud.index');
});

Route::get('/principal', function () {
    return view('principal');
});

Route::get('/competicion', function () {
    return view('competicion');
});

Route::get('/buscador', function () {
    return view('buscador');
});

Route::resource('/Crud/Equipo',EquipoController::class);

Route::resource('/Crud/Confederacion',ConfederacionController::class);

Route::resource('/Crud/Pais',PaisController::class);

Route::resource('/Crud/Competicion',CompeticionController::class);

Route::resource('/Crud/Torneo',TorneoController::class);

Route::resource('/Crud/Resultados_Liga',ResultadoLigaController::class);

Route::resource('/Crud/Resultados_Grupo',ResultadoGrupoController::class);
