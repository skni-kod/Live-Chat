<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class NewChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $status;
    public $is_support_agent;
    public $conversationId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $isSupportAgent, $conversationId)
    {
        $this->status = "ok";
        $this->message = $message;
        $this->is_support_agent = $isSupportAgent;
        $this->conversationId = $conversationId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['chat'.$this->conversationId];
    }

    public function broadcastAs()
    {
        return 'NewChatMessage';
    }
}
