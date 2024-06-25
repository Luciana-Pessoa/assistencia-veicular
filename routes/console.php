<?php

// Importa a classe Inspiring da fundação Illuminate
use Illuminate\Foundation\Inspiring;
// Importa a fachada Artisan do Illuminate\Support\Facades
use Illuminate\Support\Facades\Artisan;

// Define um novo comando Artisan chamado 'inspire'
Artisan::command('inspire', function () {
    // Dentro da função anônima, usa o método comment para exibir uma citação inspiradora
    $this->comment(Inspiring::quote());
// Define o propósito do comando como 'Display an inspiring quote' e configura para ser executado a cada hora
})->purpose('Display an inspiring quote')->hourly();