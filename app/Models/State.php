<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    // Cədvəl adı (əlavə etməyə ehtiyac yoxdur əgər cədvəl adı `states`-dirsə)
    protected $table = 'states';

    // Əsasən doldurula bilən sütunlar
    protected $fillable = ['name'];

    /**
     * State modelinin şəhərlərlə əlaqəsi.
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
