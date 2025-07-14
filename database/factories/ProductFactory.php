<?php

namespace Database\Factories;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'product_id' => \App\Models\product::inRandomOrder()->first()->id,
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(1,300),
            'stock' => $this->faker->numberBetween(1,5000),
            'create_at' => now(),
            'update_at' => now(),
            
        ];
    }
}
