<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'DOMINOES',
            '100 главных книг',
            'Мировая Классика',
            'Всемирная Литература',
            'Эксклюзивная Классика',
            'Unicorn Book',
            'Kokulu Kitaplar',
        ];

        foreach ($brands as $brand) {
            $obj = new Brand();
            $obj->name = $brand;
            $obj->save();
        }
    }
}
