<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AllProductController extends Controller
{
    public function show(Product $allproduct)
    {
        
        $product = $allproduct->load([
            'productDetail',
            'brand',
            'shop',
            'productReview',
        ]);

        $categories = Category::select('id', 'name')->where('type', 'Common')->get();
        $electronics = Category::select('id', 'name')->where('type', 'Electronics')->get();
        $furnitures = Category::select('id', 'name')->where('type', 'Furniture')->get();
        $clothings = Category::select('id', 'name')->where('type', 'Clothing')->get();
        // Return a view or JSON response with the product data
        return view('ClientPages/product_details', [
            'categories' => $categories,
            'electronics' => $electronics,
            'furnitures' => $furnitures,
            'clothings' => $clothings,
            'product' => $product,
          
        ]);
    }
}
