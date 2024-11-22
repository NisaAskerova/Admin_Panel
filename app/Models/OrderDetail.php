<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    // Cədvəl adı
    protected $table = 'order_details';

    // Mass Assignment üçün icazə verilmiş sütunlar
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price', 'total'];

    // Əlaqələr
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
