<?php
// Início do arquivo PHP e definição do namespace

namespace Database\Seeders;
// Importação de dependências

use Illuminate\Database\Seeder;
use App\Models\Prestador;
// Definição da classe PrestadorSeeder

class PrestadorSeeder extends Seeder
{
    // Método run que é executado quando o seeder é chamado
    public function run()
    {
        // Cria e insere 25 instâncias de Prestador no banco de dados
        Prestador::factory()->count(25)->create();
    }
}