<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

// Define uma rota GET para a raiz do site. Quando acessada, retorna a view 'welcome'.
Route::get('/', function () {
    return View::make('welcome');
});