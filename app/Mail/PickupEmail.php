<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PickupEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $pickup;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pickup)
    {
        $this->pickup = $pickup;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.pickup')
                    ->subject('Pickup Request');
    }
}
