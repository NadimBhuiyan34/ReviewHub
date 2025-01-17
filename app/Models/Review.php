<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $table = 'product_reviews'; // Explicitly specify the table name
    protected $fillable = [
        'user_name',
        'review_text',
    ];
}
