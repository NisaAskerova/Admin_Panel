<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'uid',
        'basket_id',
        'status',
        'name',
        'mobile_number',
        'address_line',
        'area',
        'city_id',
        'pin_code',
        'is_default',
        'total',
        'payment_type',
    ];

    /**
     * Relationships
     */

    // Relationship with City
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function basketProducts()
{
    return $this->hasMany(BasketProduct::class, 'basket_id', 'basket_id');
}
public function basket()
{
    return $this->belongsTo(Basket::class, 'basket_id');
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
