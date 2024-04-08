<?php

namespace App\Http\Requests;

use App\Models\Pickup;
use Illuminate\Foundation\Http\FormRequest;

class CreatePickupRequest extends FormRequest
{

    /**
     * Determine if the Pickup is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Pickup::$rules;
    }
}
