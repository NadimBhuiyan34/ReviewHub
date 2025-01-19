<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
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

        $related_products = Product::select('id', 'name', 'stock')->with('productDetail')
        ->where('category_id', $product->category_id)
        ->where('status', 'active')->take(10)->get();

        $shops = Shop::select('id', 'name')->get();
        $categories = Category::select('id', 'name')->where('type', 'Common')->get();
        $electronics = Category::select('id', 'name')->where('type', 'Electronics')->get();
        $furnitures = Category::select('id', 'name')->where('type', 'Furniture')->get();
        $clothings = Category::select('id', 'name')->where('type', 'Clothing')->get();
        // Return a view or JSON response with the product data
        return view('ClientPages/product_details', [
            'related_products' => $related_products,
            'shops' => $shops,
            'categories' => $categories,
            'electronics' => $electronics,
            'furnitures' => $furnitures,
            'clothings' => $clothings,
            'product' => $product,
          
        ]);
    }
}
