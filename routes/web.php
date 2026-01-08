<?php

use App\Http\Controllers\ConfederacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;

Route::get('/', function () {
    return view('welcome');
});

// Creacion de la Ruta para el crud
Route::get('/Crud', function () {
    return view('Crud.index');
});

Route::resource('/Crud/Equipo',EquipoController::class);

Route::resource('/Crud/Confederacion',ConfederacionController::class);