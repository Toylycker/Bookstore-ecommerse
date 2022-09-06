<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publisher;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Product $product) {
            //
        })->afterCreating(function (Product $product) {
            $product->authors()->sync(Author::inRandomOrder()->take(rand(1, 2))->pluck('id'));
            $product->publishers()->sync(Publisher::inRandomOrder()->first()->id);
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $discount = $this->faker->boolean(50);
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'brand_id' => $this->faker->boolean(10) ? Brand::inRandomOrder()->first()->id : null,
            'name' => $this->faker->unique()->jobTitle(),
            'body' => $this->faker->paragraph(rand(5, 10)),
            'price' => rand(1000, 10000) / 10,
            'stock' => rand(0, 50),
            'discount_percent' => $discount ? rand(2, 10) * 5 : 0,
            'discount_date_start' => Carbon::today()->addDays($discount ? rand(0, 5) : -1)->toDateString(),
            'discount_date_end' => Carbon::today()->addDays($discount ? rand(5, 10) : -1)->toDateString(),
            'sold' => rand(0, 10),
            'viewed' => rand(0, 40),
            'favorited' => rand(0, 30),
            'searched' => rand(0, 20),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now'),
        ];
    }
}
