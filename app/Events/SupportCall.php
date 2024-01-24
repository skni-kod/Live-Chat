<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class SupportCall implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $channels;
    public $data;
    public $is_support_agent;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($channels, $data, $isSupportAgent)
    {
        $this->channels = $channels;
        $this->data = $data;
        $this->is_support_agent = $isSupportAgent;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return $this->channels;
    }

    public function broadcastAs()
    {
        return 'SupportCall';
    }
}
