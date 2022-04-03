<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => rand(1, 5),
            'description' => $this->faker->sentence(),
            'price' => 22.2
        ];
    }
}
