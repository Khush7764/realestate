<?php

namespace App\Listeners;

use App\Mail\SendEnquiry;

class SendEnquiryNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $enquiry = $event->enquiry;
        $admin = config('setting.admin_email');
        \Mail::to($admin)->send(new SendEnquiry($enquiry));
    }
}
