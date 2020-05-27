<?php

namespace App\Listeners;

use Illuminate\Events\NewPostEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyPostViaSlack
{
   
    /**
     * Handle the event.
     *
     * @param  NewPostEvent  $event
     * @return void
     */
    public function handle(NewPostEvent $event)
    {
        dump('Slack message here');
    }
}
