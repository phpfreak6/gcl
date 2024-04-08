<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingTemp extends Model
{
    protected $fillable = [
        'user_id',
        'description',
        'email',
        'origin_country',
        'origin_postal',
        'origin_name',
        'origin_contact_name',
        'origin_email',
        'origin_phone',
        'origin_city',
        'origin_address_1',
        'origin_address_2',
        'destination_country',
        'destination_postal',
        'destination_name',
        'destination_contact_name',
        'destination_email',
        'destination_phone',
        'destination_city',
        'destination_address_1',
        'destination_address_2',
        'collection_note',
        'delivery_instructions'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
