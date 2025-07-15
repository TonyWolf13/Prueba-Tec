<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Al ejecutar esta seeder, podrías encontrar errores relacionados con el tamaño de los datos
        // que intentas insertar en las columnas de la base de datos (por ejemplo, "data too long for column").
        // Revisa la definición de las columnas en tu migración y asegúrate de que los valores generados
        // en la seeder sean compatibles con las restricciones de la base de datos.
        // Para generar datos de prueba de manera más sencilla y segura, utiliza factories en lugar de insertar manualmente.
        // Consulta la documentación de Laravel sobre migraciones, seeders y factories para ajustar correctamente
        // los datos que se insertan.
        /**
         * @tip Verifica los tipos y tamaños de columnas en tu migración.
         * @tip Ajusta los valores generados en la seeder para que coincidan con las restricciones.
         * @tip Utiliza factories para generar datos de prueba de manera eficiente.
         * @see https://laravel.com/docs/12.x/migrations#column-types
         * @see https://laravel.com/docs/12.x/seeding
         * @see https://laravel.com/docs/12.x/database-testing#defining-model-factories
         */
        $products = Product::factory()->count(50)->create();

    }
}
