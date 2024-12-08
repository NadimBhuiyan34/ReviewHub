<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // Fetch categories where type is 'Common'
        $categories = Category::select('id', 'name')->where('type', 'Common')->get();
        $electronics = Category::select('id', 'name')->where('type', 'Electronics')->get();
        $furnitures = Category::select('id', 'name')->where('type', 'Furniture')->get();
        $clothings = Category::select('id', 'name')->where('type', 'Clothing')->get();
    
        // Pass the categories to the view
        return view('ClientPages/home', [
            'categories' => $categories,
            'electronics' => $electronics,
            'furnitures' => $furnitures,
            'clothings' => $clothings,
        ]);
    }
    
}
