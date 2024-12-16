<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    /** @use HasFactory<\Database\Factories\ProductDetailFactory> */
    use HasFactory, HasUuids;

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'product_id', 'price', 'description', 'model_no', 'image', 'website_url',
    ];

    // Define the data type of the primary key as UUID
    protected $keyType = 'string';
    public $incrementing = false;



    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
