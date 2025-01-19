<?php

use App\Http\Controllers\AdminControllers\BrandController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\ProductController;
use App\Http\Controllers\AdminControllers\ShopController;
use App\Http\Controllers\AdminControllers\SliderController;
use App\Http\Controllers\ClientControllers\AllProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientControllers\HomeController;
use App\Http\Controllers\ClientControllers\ReviewController;
use Illuminate\Support\Facades\Route;


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); 
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('shops', ShopController::class);
    
    Route::resource('sliders', SliderController::class);
    Route::resource('products', ProductController::class);
});

Route::resource('allproducts', AllProductController::class)->only(['index', 'show']);
Route::resource('reviews', ReviewController::class)->only(['index', 'store']);
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/product', function () {
    return view('ClientPages/product_details');  
})->name('product.details');

require __DIR__.'/auth.php';
