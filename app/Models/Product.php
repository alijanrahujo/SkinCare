<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        // When creating a new product, generate a slug before saving
        static::creating(function ($product) {
            $product->slug = Str::slug($product->title);
        });

        // If you want to update the slug when the product name changes, you can use the updating event
        static::updating(function ($product) {
            $product->slug = Str::slug($product->title);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
