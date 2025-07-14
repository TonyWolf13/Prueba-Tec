<?php

namespace Database\Seeders;

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
        DB::table('products')->insert([
            'name' => Str::random(5000),
            'description' => str::random(5000),
            'price' => Str::random(1, 300),
            'stock' => Str::random(5000),
        ]);

    }
}
