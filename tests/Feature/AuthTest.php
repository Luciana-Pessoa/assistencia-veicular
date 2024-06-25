<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Factory para a criação de usuários.
class UserFactory extends Factory
{
    use HasFactory;

    // Remove the duplicate declaration of the unverified function

    /**
     * A senha padrão para todos os usuários criados pela fábrica, se não for especificada.
     *
     * @var string|null
     */
    static $password;

    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed>
     */
    function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => self::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indica que o endereço de email do modelo deve estar não verificado.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }