<?php

use Illuminate\Support\Facades\View;
use Illuminate\Routing\Route;

// Define uma rota GET para a raiz do site. Quando acessada, retorna a view 'welcome'.
Route::get('/', function () {
    return View::make('welcome');
});