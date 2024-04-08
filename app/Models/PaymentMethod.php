<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    // Example of a relationship (if applicable)
    public function user()
    {
        return $this->hasOne(\App\User::class);
    }
}
