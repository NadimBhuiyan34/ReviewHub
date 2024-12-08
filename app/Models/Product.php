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
        'brand_id',
        'name',
        'slug',
        'description',
        'price',
        'discount_price',
        'stock',
        'is_active',
    ];

     // Define the data type of the primary key as UUID
     protected $keyType = 'string';
     public $incrementing = false;
}
