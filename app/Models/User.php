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
    
       public function baskets()
    {
        return $this->hasMany(Basket::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }
    // User modelində
    public function basket()
    {
        return $this->hasOne(Basket::class);
    }
    
    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->surname; // Burada `surname` istifadəçinin soyadıdır
    }
}
