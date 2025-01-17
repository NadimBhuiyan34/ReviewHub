<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProductReview extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'product_reviews'; // Explicitly specify the table name
    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'product_id',        
        'rating',   
        'sentiment_point',     
        'sentiment_type',     
        'review',         
    ];
}
