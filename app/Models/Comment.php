<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['blog_id', 'name', 'email', 'comment', 'user_id'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
