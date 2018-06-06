<?php

namespace App\Listeners;

use App\Events\EventInterface;


class OnCustomEvent implements ListenerInterface
{
    public function __invoke(EventInterface $event) {
        die(var_dump($event->arg));
    }
}