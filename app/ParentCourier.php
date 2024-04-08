<?php

namespace App;

use Courier;
use Illuminate\Database\Eloquent\Model;

class ParentCourier extends Model
{
    protected $table = "parent_couriers";
    protected $fillable = ['logo', 'courier_name', 'auth_company', 'short_description', 'long_description'];
    public function courierServices()
    {
        return $this->hasMany(Courier::class, 'parent_id');
    }
}
