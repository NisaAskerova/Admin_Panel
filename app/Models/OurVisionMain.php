<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurVisionMain extends Model
{
    protected $fillable = [
        'type',
        'title',
        'description',
        'image'
    ];
}
