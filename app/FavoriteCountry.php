<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteCountry extends Model
{
    protected $fillable = ['country_name','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
