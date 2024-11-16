<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image', 'images', 'price', 'has_stock', 'stock_quantity', 'category_ids', 'brand_ids', 'tag_ids', 'sku',
    ];
    
    protected $casts = [
        'images' => 'array', // 'images' sütununu JSON formatında saxlamaq üçün
    ];

    protected static function booted()
    {
        static::creating(function ($product) {
            // Başlıqdan ilk 3 hərfi götürərək ön prefix yaradılır
            $titlePrefix = strtoupper(substr($product->title, 0, 3));

            // Təsadüfi unikal nömrə yaratmaq üçün
            $uniqueNumber = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);

            // SKU formatı
            $product->sku = $titlePrefix . '-' . $uniqueNumber;
        });
    }


    // Reytinqlərlə bir-çox əlaqə
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    // Orta reytinqi hesablayır
    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }

    // Rəylərlə bir-çox əlaqə
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
    

    

}
