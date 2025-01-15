<?php

namespace Database\Factories;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Shop::class;

    public function definition(): array
    {
        $ecommerceNames = [
            'Amazon',
            'eBay',
            'Walmart',
            'Alibaba',
            'Flipkart',
            'Daraz',
            'Rakuten',
            'Shopify',
            'Zalando',
            'Etsy',
            'Wayfair',
            'Best Buy',
            'Target',
            'Myntra',
            'Overstock',
            'Newegg',
            'Snapdeal',
            'BigCommerce',
            'AliExpress',
            'Lazada',
        ];

        return [
            'id' => Str::uuid(), // Generates a UUID for the primary key
            'name' => $this->faker->unique()->randomElement($ecommerceNames), // Random e-commerce site name
            'status' => $this->faker->randomElement(['active', 'inactive']), // Random status
        ];
    }
}
