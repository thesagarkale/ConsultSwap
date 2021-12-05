<?php

namespace App\Listeners\Notifications;

use App\Events\AnswerCreated;
use App\Events\NewMessage;
use App\Events\TickCreated;
use App\Models\Tick;
use App\Services\Notifications;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MessageNotification
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
        $this->notifications = $notifications;
    }

    /**
     * Handle the event.
     *
     * @param NewMessage $event
     * @return void
     */
    public function handle(NewMessage $event)
    {
        $this->notifications->createFromInput([
            'user_id' => $event->getMessage()->receiver->id,
            'related_to' => 'message',
            'related_id' => $event->getMessage()->id,
            'notification' => sprintf('New message from %s', ucfirst($event->getMessage()->sender->first_name)),
            'url' => sprintf('/messages?from=%s', $event->getMessage()->sender->username),
        ]);
    }
}
