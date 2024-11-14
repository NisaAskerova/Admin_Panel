<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Bu satırı ekleyin

class User extends Authenticatable
{
    use HasApiTokens, Notifiable; // HasApiTokens trait'ini ekleyin

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class, 'author_id');
    }
}
