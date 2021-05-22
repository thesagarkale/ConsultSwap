<?php

namespace App\Listeners;

use App\Events\UserInductionComplete;
use App\Services\UserMetadata;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUserMetadata
{
    /**
     * @var UserMetadata
     */
    private $metadata;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserMetadata $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * Handle the event.
     *
     * @param  UserInductionComplete  $event
     * @return void
     */
    public function handle(UserInductionComplete $event): void
    {
        $this->metadata->createFromInput($event->getUser()->id, 'induction', true);
    }
}
