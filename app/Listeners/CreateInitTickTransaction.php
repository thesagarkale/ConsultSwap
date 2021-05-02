<?php

namespace App\Listeners;

use App\Events\TickCreated;
use App\Models\TickTransaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateInitTickTransaction
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
     * @param  TickCreated  $event
     * @return void
     */
    public function handle(TickCreated $event)
    {
        TickTransaction::create([
            'tick_id' => $event->getTick()->id,
            'credit' => null,
            'debit' => null,
            'balance' => 0,
            'created_by' => $event->getTick()->created_by,
        ]);
    }
}
