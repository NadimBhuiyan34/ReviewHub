<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product extends Model
{
    use HasFactory, HasUuids;

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'name',        // Name of the product
        'brand_id',    // Foreign Key for Brand
        'shop_id',     // Foreign Key for Shop
        'category_id', // Foreign Key for Category
        'type',        // Type of product
        'stock',       // Product stock
        'status',      // Status (e.g., active/inactive)
    ];

    // Define the data type of the primary key as UUID
    protected $keyType = 'string';
    public $incrementing = false;


    public function productDetail()
    {
        return $this->hasOne(ProductDetail::class);
    }
    public function productReview()
    {
        return $this->hasMany(Review::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }



    /**
     * Relationship: Product has many Variants
     */
    public function productVariant()
    {
        return $this->hasOne(ProductVariant::class);
    }
}
