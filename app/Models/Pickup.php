<?php

namespace App\Models;

use App\User;
use Eloquent as Model;

class Pickup extends Model
{
    protected $table = 'pickups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'date',
        'admin_id',
        'status',
        'admin_comment',
        'customer_id',
        'earliest_time',
        'latest_time',
        'instructions',
        'no_packages',
        'weight',
        'length',
        'width',
        'height',
        'courier',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required',
        'earliest_time' => 'required',
        'latest_time' => 'required',
        'no_packages' => 'required|numeric',
        'weight' => 'required|numeric',
        'length' => 'required|numeric',
        'width' => 'required|numeric',
        'height' => 'required|numeric',
        'courier' => 'required'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
