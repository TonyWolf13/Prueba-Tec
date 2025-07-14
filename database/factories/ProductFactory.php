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

        /**
         * Revisa cuidadosamente las columnas definidas en la migración de la tabla products y compáralas con las que estás utilizando en el factory.
         * Verifica si todas las columnas que intentas poblar realmente existen en la base de datos.
         * Consulta la documentación de Laravel sobre factories y migraciones para asegurarte de que los nombres de las columnas y los tipos de datos sean correctos.
         * Presta atención a posibles errores de escritura en los nombres de las columnas y a la convención de nombres utilizada en tu modelo y migración.
         */

        return [
            'product_id' => \App\Models\product::inRandomOrder()->first()->id,
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(1, 300),
            'stock' => $this->faker->numberBetween(1, 5000),
            'create_at' => now(),
            'update_at' => now(),

        ];
    }
}
