<?php

namespace App\Repositories;

use App\Models\Pickup;
use App\Mail\PickupEmail;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 * Class PickupRepository
 * @package App\Repositories
 * @version March 19, 2020, 11:14 am UTC
*/

class PickupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pickup::class;
    }

    public function createPickup($input)
    {
        $input['customer_id'] = Auth::id();
        $pickup = $this->model->newInstance($input);
        $pickup->save();

        // send email
        $recipientEmail = env('MAIL_RECIPIENT_EMAIL', 'fallback@example.com');
        Mail::to($recipientEmail)->send(new PickupEmail($pickup));

        return $pickup;
    }
}
