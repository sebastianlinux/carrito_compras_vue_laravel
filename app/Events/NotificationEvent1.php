<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationEvent1 implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $friendId;
    public $friendImg;
    public $friendName;
    public function __construct($message,$friendId,$friendImg,$friendName)
    {
        $this->message = $message;
        $this->friendId = $friendId;
        $this->friendImg = $friendImg;
        $this->friendName = $friendName;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //$friendId = '1';
        $channel = 'userchannel'.$this->friendId;
        //return [$channel];
        return [$channel];
    }

    public function broadcastAs()
    {
        return 'notification';
    }
}
