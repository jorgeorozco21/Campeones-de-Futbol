<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/competicion', function () {
    return view('competicion');
});

Route::get('/buscador', function () {
    return view('buscador');
});