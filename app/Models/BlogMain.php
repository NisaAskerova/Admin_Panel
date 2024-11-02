<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogMain extends Model
{
    protected $fillable = [
        'type',
        'title',
        'description', 
    ];
}
