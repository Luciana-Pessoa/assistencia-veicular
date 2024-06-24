<?php

Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:api')->get('servicos', [ServicoController::class, 'index']);


Route::middleware('auth:api')->get('geocode/{endereco}', [GeocodeController::class, 'show']);

Route::middleware('auth:api')->post('prestadores', [PrestadorController::class, 'search']);

Route::post('/prestadors', [App\Http\Controllers\PrestadorController::class, 'store']);