<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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