<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChatMessageWasReceived extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $chatMessage;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($chatMessage, $user)
    {
        $this->chatMessage = $chatMessage;
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [
            "chat-room.1"
        ];
    }
}
