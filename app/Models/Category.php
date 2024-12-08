<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'type',
        'slug',
        'description',
        'status',
    ];

    protected $table = 'categories';


    protected $primaryKey = 'id';
    public $incrementing = false;

    // Automatically generate the slug before saving the category
    protected static function booted()
    {
        static::creating(function ($category) {
            // Generate the slug if it's not already set
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            // Prevent the slug from updating when the category is updated
            // (Only if the name hasn't changed, you can adjust this logic as needed)
            if ($category->isDirty('name') && empty($category->getOriginal('slug'))) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // Optional: You can keep your unique slug logic in a separate method if needed
    public function generateSlug()
    {
        $slug = Str::slug($this->name);

        // Check if the slug exists in the database and make it unique
        $existingSlugCount = self::where('slug', $slug)->count();

        if ($existingSlugCount > 0) {
            $slug = $slug . '-' . time();  // Or use any other unique identifier
        }

        return $slug;
    }

    
}
