<?php

namespace App;

use App\Models\PaymentMethod;
use App\Traits\UploadFile;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasMediaTrait;
    use UploadFile;

    use HasRoles;
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'dcID',
        'user_code',
        'first_name',
        'last_name',
        'email',
        'phone_no',
        'company_name',
        'registration_no',
        'vat',
        'business_location',
        'address_1',
        'address_2',
        'town',
        'city',
        'postal',
        'country',
        'password',
        'active',
        'image',
        'contact_first_name',
        'contact_last_name',
        'contact_email',
        'contact_phone_no',
        'industry',
        'payment_method_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'dcID' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'company_name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|confirmed',
        'phone_no' => 'required',
        'address_1' => 'required',
        'city' => 'required',
        'postal' => 'required',
        'country' => 'required',
        'contact_first_name' => 'required',
        'contact_last_name' => 'required',
        'contact_email' => 'required',
        'contact_phone_no' => 'required',
        'industry' => 'required',
    ];

    public static $updaterules = [
        'dcID' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'company_name' => 'required',
        'email' => 'required',
        'password' => 'sometimes|confirmed',
        'phone_no' => 'required',
        'address_1' => 'required',
        'city' => 'required',
        'postal' => 'required',
        'country' => 'required',
        'contact_first_name' => 'required',
        'contact_last_name' => 'required',
        'contact_email' => 'required',
        'contact_phone_no' => 'required',
        'industry' => 'required',
        'payment_method_id' => 'required',
    ];

    public static $profileRules = [
        'password' => 'sometimes|confirmed',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    public function favoriteCountries()
    {
        return $this->hasMany(FavoriteCountry::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
