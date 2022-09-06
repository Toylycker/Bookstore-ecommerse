<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Audiobooks',
            'Education',
            'Biography',
            'Business',
            'Children\'s books',
            'Detective',
            'Literature',
            'Parenting and family',
            'Encyclopedia',
            'Fantasy',
            'Philosophy',
            'Entertainment',
            'Law',
            'Diet and Health',
            'Medicine',
            'Study guides',
            'Self development',
            'Romance',
            'Psychology',
            'Sports',
            'Art',
            'Poetry',
            'Tourism',
            'History',
            'Technology',
            'Economics',
            'Science',
        ];

        foreach ($categories as $category) {
            $obj = new Category();
            $obj->name = $category;
            $obj->save();
        }
    }
}
