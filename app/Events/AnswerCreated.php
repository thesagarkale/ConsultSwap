<?php

namespace App\Events;

use App\Models\Answer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AnswerCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Answer
     */
    private $answer;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }


    public function getAnswer(): Answer
    {
        return $this->answer;
    }
}
