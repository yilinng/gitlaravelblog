<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class NewPostEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $blog;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    
}
