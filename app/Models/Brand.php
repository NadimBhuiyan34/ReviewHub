<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
    use HasFactory, HasUuids;
    protected $fillable = [
        'name',
        'status',
    ];

    protected $table = 'brands';


    protected $primaryKey = 'id';
    public $incrementing = false;
}
