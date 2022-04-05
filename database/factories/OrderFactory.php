<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
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
            'product_id' => rand(1, 5),
            'order_number' => rand(1000, 5000),
            'purchase_date' => date('Y-m-d'),
            'amount' => rand(1, 15),
            'status' => strtolower('aberto'),
        ];
    }
}
