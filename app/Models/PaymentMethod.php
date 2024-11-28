<?php

// PaymentMethod Modeli
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'method', 'transaction_id', 'amount', 'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
