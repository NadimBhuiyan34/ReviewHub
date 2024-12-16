<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    /** @use HasFactory<\Database\Factories\ShopFactory> */
    use HasFactory, HasUuids;
    protected $fillable = [
        'name',
        'status',
    ];

    protected $table = 'shops';


    protected $primaryKey = 'id';
    public $incrementing = false;
}
