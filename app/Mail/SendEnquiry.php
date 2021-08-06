<?php

namespace App\Mail;

use App\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEnquiry extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiry;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $route =
        $property = Property::findOrFail($this->enquiry->property_id);
        return $this->subject('New enquiry')->markdown('email.send_enquiry')->with(['enquiry' => $this->enquiry, 'property' => $property]);
    }
}
