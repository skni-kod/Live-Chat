<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\Message; // Import your Message model

class WebsocketEvent implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $message;
    public $event;

    public function __construct($event, $data)
    {
        // Insert data into database using Message model
        $message = Message::createMessage(
            json_encode($data),
            1,
            1
        );

        // Set the message data to be broadcasted
        $this->message = $message;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('chat');
    }

    public function broadcastAs(): string
    {
        return 'WebsocketEvent';
    }
}


