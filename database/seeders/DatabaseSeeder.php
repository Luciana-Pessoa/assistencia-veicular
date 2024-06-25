<?php
// Define o namespace do arquivo, indicando sua localização dentro da estrutura do projeto

namespace Database\Seeders;
// Importa as classes necessárias de outros arquivos

use Illuminate\Database\Seeder;
use App\Models\Prestador;
use App\Models\Servico;
use App\Models\ServicoPrestador;
// Declaração da classe DatabaseSeeder que estende a classe Seeder do Laravel

class DatabaseSeeder extends Seeder
{
    // Método run que será chamado para executar os seeders
    public function run()
    {
        // Chama outros seeders específicos para preencher o banco de dados
        $this->call([
            PrestadorSeeder::class,
            ServicoSeeder::class,
            ServicoPrestadorSeeder::class
        ]);
    }
}