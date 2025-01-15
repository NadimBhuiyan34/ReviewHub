<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Shop;
use App\Models\Category;
use Illuminate\Support\Str;
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
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'name' => $this->faker->word(),
            'brand_id' => Brand::inRandomOrder()->first()->id,
            'shop_id' => Shop::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'type' => $this->faker->randomElement(['Featured', 'Popular', 'Best Seller']),
            'stock' => $this->faker->numberBetween(1, 1000),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
