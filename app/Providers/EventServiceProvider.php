<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Events\NewPostEvent;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewPostEvent::class => [
            \App\Listeners\AddNewPostListener::class,
            \App\Listeners\NotifyPostViaSlack::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
