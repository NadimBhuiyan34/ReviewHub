<?php

namespace Database\Factories;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Brand::class;

    public function definition(): array
    {
        $realBrandNames = [
            'Apple',
            'Samsung',
            'Sony',
            'LG',
            'Nike',
            'Adidas',
            'Microsoft',
            'Google',
            'Amazon',
            'Tesla',
            'BMW',
            'Mercedes-Benz',
            'Intel',
            'Cisco',
            'Pepsi',
            'Coca-Cola',
            'Nestle',
            'Procter & Gamble',
            'Unilever',
            'Ford',
        ];

        return [
            'id' => Str::uuid(), // Generates a UUID for the primary key
            'name' => $this->faker->randomElement($realBrandNames), // Random real-world brand name
            'status' => $this->faker->randomElement(['active', 'inactive']), // Random status
        ];
    }

}
