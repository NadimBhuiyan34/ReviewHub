<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductReview;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(50)->create()->each(function ($product) {
            ProductDetail::factory()->create(['product_id' => $product->id]);
            // Create 20 reviews for each product
            ProductReview::factory()->count(20)->create(['product_id' => $product->id]);
        });
        
    }
}
