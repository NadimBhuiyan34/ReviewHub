<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         
        $products = Product::select('id', 'name', 'stock')
        ->with('productDetail')->latest()->paginate(10);
        
        
        return view('AdminPages.Product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $shops = Shop::all();
        $categories = Category::all();

        // Return the create view with related data
        return view('AdminPages.Product.create', compact('brands', 'shops', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
 
            $validatedData = $request->validated();
    
            // Create Product
            $product = Product::create([
                'name' => $validatedData['name'],
                'brand_id' => $validatedData['brand_id'],
                'shop_id' => $validatedData['shop_id'],
                'category_id' => $validatedData['category_id'],
                'type' => $validatedData['type'],
                'stock' => $validatedData['stock'],
                'status' => $validatedData['status'],
            ]);
    
            // Handle Image Upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('product_images', 'public');
            } else {
                $imagePath = null;
            }
    
            // Create Product Details
            $product->productDetail()->create([
                'price' => $validatedData['price'],
                'description' => $validatedData['description'],
                'model_no' => $validatedData['model_no'],
                'image' => $imagePath,
                'website_url' => $validatedData['website_url'],
            ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
        $product = $product->load([
            'productDetail',
            'brand',
            'shop',
            'category',
        ]);
       
        
        // Return the create view with related data
        return view('AdminPages.Product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product = $product->load([
            'productDetail',
            'brand',
            'shop',
            'category',
        ]);

        $brands = Brand::all();
        $shops = Shop::all();
        $categories = Category::all();
        // Return the create view with related data
        return view('AdminPages.Product.edit', compact('product','brands', 'shops', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Validate incoming data
        $validatedData = $request->validated();
    
        // Update Product information
        $product->update([
            'name' => $validatedData['name'],
            'brand_id' => $validatedData['brand_id'],
            'shop_id' => $validatedData['shop_id'],
            'category_id' => $validatedData['category_id'],
            'type' => $validatedData['type'],
            'stock' => $validatedData['stock'],
            'status' => $validatedData['status'],
        ]);
    
        $imagePath = $product->productDetail->image ?? null; // Default to existing image

        if ($request->hasFile('image')) {
            // Validate and store the uploaded image
            $imagePath = $request->file('image')->store('product_images', 'public');
        
            // Delete the old image if a new one is uploaded successfully
            if ($product->productDetail && $product->productDetail->image) {
                Storage::disk('public')->delete($product->productDetail->image);
            }
        }
    
        // Update or Create Product Details
        $product->productDetail()->updateOrCreate(
            [],
            [
                'price' => $validatedData['price'],
                'description' => $validatedData['description'],
                'model_no' => $validatedData['model_no'],
                'image' => $imagePath,
                'website_url' => $validatedData['website_url'],
            ]
        );
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
        ->with('success', 'Product deleted successfully!');

    }
}
