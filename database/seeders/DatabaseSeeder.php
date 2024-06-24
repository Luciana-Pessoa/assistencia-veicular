<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestador;
use App\Models\Servico;
use App\Models\ServicoPrestador;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PrestadorSeeder::class,
            ServicoSeeder::class,
            ServicoPrestadorSeeder::class
        ]);
    }
}