<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'review_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Review modeline olan ilişkiyi de gözden geçirebiliriz
    public function review()
    {
        return $this->belongsTo(Review::class, 'review_id');
    }
}
