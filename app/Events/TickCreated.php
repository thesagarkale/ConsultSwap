<?php

namespace App\Events;

use App\Models\Tick;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TickCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Tick
     */
    private $tick;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Tick $tick)
    {
        $this->tick = $tick;
    }

    public function getTick(): Tick
    {
        return $this->tick;
    }
}
