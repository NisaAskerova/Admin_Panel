<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model
{
    use HasFactory;

    protected $table = 'basket_products'; // Cədvəl adı

    protected $fillable = ['basket_id', 'product_id', 'quantity']; 


    public function basket()
    {
        return $this->belongsTo(Basket::class, 'basket_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
}

