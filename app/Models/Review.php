<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  
        'product_id',  
        'review_comment', 
        'review_date',   
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function rating()
    {
        return $this->hasOne(Rating::class, 'product_id', 'product_id');  // Assuming Rating is related by product_id
    }
}
