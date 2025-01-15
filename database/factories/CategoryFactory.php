<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Toys',
            'Books',
            'Beauty Products',
            'Home Appliances',
            'Fitness Equipment',
            'Groceries',
            'Jewelry',
            'Automotive',
            'Sports Equipment',
            'Health Products'
        ];
        
        
    
        $name = $this->faker->unique()->randomElement($categories); // নিশ্চিত ইউনিক মান
    
        return [
            'id' => Str::uuid(), // Generates a unique UUID
            'name' => $name,
            'type' => $this->faker->randomElement(['Electronics', 'Furniture', 'Clothing', 'Common']),
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->boolean(),
        ];
    }
    

 
}
