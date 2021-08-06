<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Enquiry
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $enquiry;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
