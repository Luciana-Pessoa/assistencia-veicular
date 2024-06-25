<?php

use Illuminate\Support\Facades\Route;

// Define uma rota GET para a raiz do site. Quando acessada, retorna a view 'welcome'.
Route::get('/', function () {
    return view('welcome');
});