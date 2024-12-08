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

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);  // Yorum yapan kullanıcı
    }
    public function ratings()
{
    return $this->hasMany(Rating::class, 'review_id');
}

}
