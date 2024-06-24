<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestador;

class PrestadorSeeder extends Seeder
{
    public function run()
    {
        Prestador::factory()->count(25)->create();
    }
}
