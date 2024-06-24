<?php
namespace Database\Factories;

use App\Models\Prestador;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrestadorFactory extends Factory
{
    protected $model = Prestador::class;

    public function definition()
    {
        return [
            // Defina aqui os campos do modelo e seus valores padrão
            'nome' => $this->faker->name,
            // Adicione outros campos conforme necessário
        ];
    }
}