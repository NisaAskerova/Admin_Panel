<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Cədvəl adı
    protected $table = 'payments';

    // Mass Assignment üçün icazə verilmiş sütunlar
    protected $fillable = ['order_id', 'user_id', 'status', 'type'];

    // Əlaqələr
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
