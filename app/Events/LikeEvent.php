<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Log;

class LikeEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public $type;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id, $type)
    {
        // Log::debug([
        //     'Байгуулагч',
        //     $id,
        //     $type
        //     ]);
        $this->id = $id;
        $this->type = $type;
        //dd($id);
        //dd($type);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        dd(3);
        Log::debug('Байгуулагч broadcastOn');
        return new Channel('likeChannel');
        //return new Channel('likeChannel');
    }
}
