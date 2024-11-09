<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'price', 'has_stock', 'stock_quantity', 'image'
    ];

    protected static function booted()
    {
        static::creating(function ($product) {
            $product->sku = 'SKU-' . strtoupper(substr($product->title, 0, 3)) . '-' . time();
        });
    }
}
