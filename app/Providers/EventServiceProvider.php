<?php

namespace App\Providers;

use App\Events\AnswerCreated;
use App\Events\TickCreated;
use App\Events\UserInductionComplete;
use App\Listeners\CreateInitTickTransaction;
use App\Listeners\CreateTick;
use App\Listeners\UpdateUserMetadata;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
            CreateTick::class
        ],
        TickCreated::class => [
            CreateInitTickTransaction::class
        ],
        UserInductionComplete::class => [
            UpdateUserMetadata::class
        ]
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
