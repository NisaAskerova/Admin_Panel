<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantity'];

    // User ilə əlaqə (Bir istifadəçinin yalnız bir səbəti olur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    // Product ilə əlaqə (Bir səbətdə çox məhsul ola bilər)
    public function products()
    {
        return $this->belongsToMany(Product::class, 'basket_products')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

  

}
