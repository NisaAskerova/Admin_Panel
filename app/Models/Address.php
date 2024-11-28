<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'name',
        'mobile_number',
        'address_line',
        'area',
        'city_id',
        'pin_code',
        'is_default',
    ];

    /**
     * Address modelinin şəhərlə əlaqəsi.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
