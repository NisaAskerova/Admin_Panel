<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhoWeAreService extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'color'
    ];
}
