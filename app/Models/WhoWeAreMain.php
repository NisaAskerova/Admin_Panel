<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhoWeAreMain extends Model
{

    protected $fillable = [
        'main_title',
        'main_description',
        'image'
    ];
}
