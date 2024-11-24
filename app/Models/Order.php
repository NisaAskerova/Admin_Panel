<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Cədvəl adı
    protected $table = 'orders';

    // Mass Assignment üçün icazə verilmiş sütunlar
    protected $fillable = ['user_id', 'quantity', 'uid', 'basket_id', 'status'];

    // Əlaqələr
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function basket()
{
    return $this->belongsTo(Basket::class);
}

}
