<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSecura extends Model
{
    protected $fillable=[
        'type',
        'title',
        'description',
        'image',
    ];
}
