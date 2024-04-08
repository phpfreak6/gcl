<?php
namespace App\Models;

use App\ParentCourier;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $fillable = [
        'preset_id',
        'Name',
        'service_id',
        'service_key',
        'service_code',
        'service_surcharge',
        'global_product_code',
        'local_product_code',
        'parent_id',
        'exp_lead_time',
        'pickup',
        'dropoff',
    ];
    
    /**
     * Get the parent courier that owns the courier.
     */
    public function parentCourier()
    {
        return $this->belongsTo(ParentCourier::class, 'parent_id');
    }
}
