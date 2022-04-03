<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
                'name' => $this->faker->name(),
                'cpf' => rand(10000000000, 99999999999),
                'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
