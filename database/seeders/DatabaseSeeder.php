<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Factories\UserFactory;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /**
         * @see https://laravel.com/docs/12.x/seeding#running-seeders
         * Investiga cómo llamar explícitamente al seeder de productos.
         * Investiga cómo manejar duplicados o truncar la tabla antes de sembrar para evitar problemas al ejecutar los seeders múltiples veces.
         * Recuerda que puedes ejecutar los seeders con: php artisan db:seed
         */

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
