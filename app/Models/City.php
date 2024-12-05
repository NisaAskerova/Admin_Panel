<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = ['name', 'state_id'];

    /**
     * City modelinin state ilə əlaqəsi.
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }


    /**
     * City modelinin ünvanlarla əlaqəsi.
     */
    public function addresses()
    {
        return $this->hasMany(related: Address::class);
    }
}
