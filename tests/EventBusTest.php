<?php

namespace Tests;

use App\Services\EventBus;
use App\ServiceContainer;
use PHPUnit\Framework\TestCase;
use App\Listeners\OnCustomEvent;
use App\Events\CustomEvent;


class EventBusTest extends TestCase
{
    public $bus;

    public function setUp()
    {
        ServiceContainer::bind('EventBus', new EventBus);

        $this->bus = ServiceContainer::get('EventBus');
    }

    /** @test */
    public function it_can_register_listener()
    {
        $this->bus->subscribe(CustomEvent::class, new OnCustomEvent());

        $this->bus->dispatch(new CustomEvent('12'));

    }
}