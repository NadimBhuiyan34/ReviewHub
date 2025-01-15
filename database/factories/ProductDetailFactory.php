<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ProductDetail;
use App\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDetail>
 */
class ProductDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductDetail::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'product_id' => Product::factory(),
            'price' => $this->faker->randomFloat(2, 1, 10000),
            'description' => $this->faker->paragraph(),
            'model_no' => $this->faker->unique()->word(),
            'image' => $this->faker->imageUrl(),
            'website_url' => $this->faker->url(),
        ];
    }
}
