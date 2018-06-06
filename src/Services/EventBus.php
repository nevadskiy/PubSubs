<?php

namespace App\Services;

use App\Events\CustomEvent;
use App\Listeners\OnCustomEvent;
use App\Events\EventInterface;
use App\Listeners\ListenerInterface;


class EventBus
{
    protected $events = [];

    // public function __construct()
    // {
    //     $this->subscribe(CustomEvent::class, new OnCustomEvent($event));
    // }

    public function subscribe(string $name, ListenerInterface $listener)
    {
        $this->events[$name][] = $listener;
    }

    public function dispatch(EventInterface $event)
    {
        foreach ($this->events[get_class($event)] as $trigger) {
            $trigger($event);
        }
    }
}