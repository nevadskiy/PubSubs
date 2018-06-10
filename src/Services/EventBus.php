<?php

namespace App\Services;

use App\Events\EventInterface;

class EventBus
{
    protected $events = [];

    public function subscribe(string $name, callable $listener)
    {
        $this->events[$name][] = $listener;
    }

    public function dispatch(EventInterface $event)
    {
        foreach ($this->events[get_class($event)] as $trigger) {
            $trigger($event);
        }
    }

    public function getEvents()
    {
        return $this->events;
    }
}