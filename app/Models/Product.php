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
    
 
     /**
      * Relationship: Product has many Variants
      */
     public function productVariant()
     {
         return $this->hasOne(ProductVariant::class);
     }
}
