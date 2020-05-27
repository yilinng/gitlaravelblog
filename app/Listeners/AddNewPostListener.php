<?php

namespace App\Listeners;

use App\Mail\AddNewPostMail;
use Illuminate\Support\Facades\Mail;


class AddNewPostListener
{
    

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->blog->email)->send(new AddNewPostMail());

    }
}
