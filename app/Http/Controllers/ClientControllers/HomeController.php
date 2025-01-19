<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // Fetch categories where type is 'Common'
        $products = Product::select('id', 'name', 'stock')
        ->with('productDetail') 
        ->where('status', 'active')
        ->where('type', 'Popular')
        ->get();

        $featured = Product::select('id', 'name', 'stock')
        ->with('productDetail') 
        ->where('status', 'active')
        ->where('type', 'Featured')
        ->first();
        
        
        $seller = Product::select('id', 'name', 'stock')
        ->with('productDetail') 
        ->where('status', 'active')
        ->where('type', 'Best Seller')
        ->get();
        
        $shops = Shop::select('id', 'name')->get();
        $categories = Category::select('id', 'name')->where('type', 'Common')->get();
        $electronics = Category::select('id', 'name')->where('type', 'Electronics')->get();
        $furnitures = Category::select('id', 'name')->where('type', 'Furniture')->get();
        $clothings = Category::select('id', 'name')->where('type', 'Clothing')->get();
        $sliders = Slider::all();

        
    
        // Pass the categories to the view
        return view('ClientPages/home', [
            'shops' => $shops,
            'seller' => $seller,
            'featured' => $featured,
            'products' => $products,
            'categories' => $categories,
            'electronics' => $electronics,
            'furnitures' => $furnitures,
            'clothings' => $clothings,
            'sliders' => $sliders,
        ]);
    }
    
}
