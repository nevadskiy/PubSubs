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
        $listener = new OnCustomEvent();

        $this->bus->subscribe(CustomEvent::class, $listener);

        $this->assertContains($listener, $this->bus->getEvents()[CustomEvent::class]);
    }

    /** @test */
    public function it_can_dispatch_an_event()
    {
        $a = false;

        $listener = function () use (&$a) {
            $a = true;
        };

        $this->bus->subscribe(CustomEvent::class, $listener);
        $this->bus->dispatch(new CustomEvent(12));

        $this->assertTrue($a);
    }
}