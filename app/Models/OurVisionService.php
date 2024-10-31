<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurVisionService extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
    ];
}