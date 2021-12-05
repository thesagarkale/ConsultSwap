<?php

namespace App\Providers;

use App\Events\AnswerCreated;
use App\Events\NewMessage;
use App\Events\TickCreated;
use App\Events\UserInductionComplete;
use App\Listeners\CreateInitTickTransaction;
use App\Listeners\CreateTick;
use App\Listeners\Notifications\AnswerNotification;
use App\Listeners\Notifications\MessageNotification;
use App\Listeners\UpdateUserMetadata;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AnswerCreated::class => [
            CreateTick::class,
            AnswerNotification::class
        ],
        TickCreated::class => [
            CreateInitTickTransaction::class
        ],
        UserInductionComplete::class => [
            UpdateUserMetadata::class
        ],
        NewMessage::class => [
            MessageNotification::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
