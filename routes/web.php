<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/competicion', function () {
    return view('competicion');
});

Route::get('/buscador', function () {
    return view('buscador');
});