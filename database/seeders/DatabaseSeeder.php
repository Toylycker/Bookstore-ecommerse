<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
        ]);
        \App\Models\Author::factory()->count(50)->create();
        \App\Models\Publisher::factory()->count(50)->create();
        \App\Models\Product::factory()->count(500)->create();
    }
}
