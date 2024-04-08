<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'request_id',
        'reference',
        'origin_country',
        'origin_postal',
        'origin_name',
        'origin_email',
        'origin_phone',
        'origin_city',
        'origin_address',
        'destination_country',
        'destination_postal',
        'destination_name',
        'destination_email',
        'destination_phone',
        'destination_city',
        'destination_address',
        'total_items',
        'total_weight',
        'total_price',
        'service_code',
        'type',
        'tracking_codes',
        'tracking_urls',
        'uri',
        'key',
        'tracking_request_id',
        'tracking_request_hash',
        'label_size',
        'courier',
        'dc_service_id',
        'dc_request_id',
        'vat_price',
        'shipping_price',
        'terms',
        'payment_gateway'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
