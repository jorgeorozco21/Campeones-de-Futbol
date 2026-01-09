<?php

use App\Http\Controllers\ConfederacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PaisController;

Route::get('/', function () {
    return view('welcome');
});

// Creacion de la Ruta para el crud
Route::get('/Crud', function () {
    return view('Crud.index');
});

Route::resource('/Crud/Equipo',EquipoController::class);

Route::resource('/Crud/Confederacion',ConfederacionController::class);

Route::resource('/Crud/Pais',PaisController::class);