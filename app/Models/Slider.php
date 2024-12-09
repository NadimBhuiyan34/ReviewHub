<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /** @use HasFactory<\Database\Factories\SliderFactory> */
    use HasFactory, HasUuids;


    // Set the primary key type to string for UUID
    protected $keyType = 'string';

    // Disable auto-increment
    public $incrementing = false;
    protected $primaryKey = 'id';

    // The attributes that are mass assignable
    protected $fillable = ['title', 'image', 'description'];

    // Automatically generate a UUID for t
}
