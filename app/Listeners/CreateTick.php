<?php

namespace App\Listeners;

use App\Events\AnswerCreated;
use App\Events\TickCreated;
use App\Models\Tick;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateTick
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
     * @param  AnswerCreated  $event
     * @return void
     */
    public function handle(AnswerCreated $event)
    {
        $tick = Tick::create([
            'related_type' => 'answer',
            'related_id' => $event->getAnswer()->id,
            'created_by' => $event->getAnswer()->answered_by
        ]);

        TickCreated::dispatch($tick);
    }
}
