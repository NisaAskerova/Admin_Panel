<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image', 'images', 'price', 'has_stock', 'stock_quantity', 'category_ids', 'brand_ids', 'tag_ids', 'sku',
        'product_id'
    ];

    protected $casts = [
        'images' => 'array', // 'images' sütununu JSON formatında saxlamaq üçün
    ];

    protected static function booted()
    {
        static::creating(function ($product) {
            $titlePrefix = strtoupper(substr($product->title, 0, 3));
            $uniqueNumber = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
            $product->sku = $titlePrefix . '-' . $uniqueNumber;
        });
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_product');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }
    public function isInStock(): bool
    {
        return $this->has_stock && $this->stock_quantity > 0;
    }
    public function baskets()
    {
        return $this->belongsToMany(Basket::class, 'basket_products')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
    
    
    

}

