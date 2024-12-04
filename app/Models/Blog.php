<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'type',
        'title',
        'description',
        'image',
        'date_icon',
        'button_icon', 
        'detail_description',
        'detail_text',
        'detail_short_description',
    ];
    
}
