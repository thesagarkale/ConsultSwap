<?php

namespace App\Listeners\Notifications;

use App\Events\AnswerCreated;
use App\Services\Notifications;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AnswerNotification
{
    /**
     * @var Notifications
     */
    private $notifications;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(
        Notifications $notifications
    ) {
        //
        $this->notifications = $notifications;
    }

    /**
     * Handle the event.
     *
     * @param  AnswerCreated  $event
     * @return void
     */
    public function handle(AnswerCreated $event)
    {
        $this->notifications->createFromInput([
            'user_id' => $event->getAnswer()->question->creator->id,
            'related_to' => 'question',
            'related_id' => $event->getAnswer()->question->id,
            'notification' => sprintf('%s has answered one your questions', ucfirst($event->getAnswer()->answerer->first_name)),
            'url' => sprintf('/questions/%d', $event->getAnswer()->question->id),
        ]);
    }
}
