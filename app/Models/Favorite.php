<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    // Sevimli məhsul cədvəlindəki əlaqələr
    protected $table = 'favorites'; // Əgər ad standartdan fərqlidirsə, cədvəl adını göstərməlisiniz

    // Yalnız aşağıdakı sütunlar daxil edilsin (Əlavə edilə bilər)
    protected $fillable = ['user_id', 'product_id'];

    // İstifadəçi ilə əlaqə (Sevimliləri əlavə edən istifadəçi)
    public function user()
    {
        return $this->belongsTo(User::class); // Hər bir sevimli məhsul bir istifadəçiyə məxsusdur
    }

    // Məhsul ilə əlaqə (Sevimli məhsul)
    public function product()
    {
        return $this->belongsTo(Product::class); // Hər bir sevimli məhsul bir məhsula məxsusdur
    }
}
