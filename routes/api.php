<?php

// Define uma rota POST para o login, usando o AuthController
Route::post('login', [AuthController::class, 'login']);

// Define uma rota GET para 'servicos', acessível apenas com autenticação, usando o ServicoController
Route::middleware('auth:api')->get('servicos', [ServicoController::class, 'index']);

// Define uma rota GET para 'geocode/{endereco}', acessível apenas com autenticação, usando o GeocodeController
Route::middleware('auth:api')->get('geocode/{endereco}', [GeocodeController::class, 'show']);

// Define uma rota POST para 'prestadores', acessível apenas com autenticação, usando o PrestadorController
Route::middleware('auth:api')->post('prestadores', [PrestadorController::class, 'search']);

// Define uma rota POST para '/prestadors', usando o PrestadorController para criar um novo prestador
Route::post('/prestadors', [App\Http\Controllers\PrestadorController::class, 'store']);