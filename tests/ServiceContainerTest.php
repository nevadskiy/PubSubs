<?php
use PHPUnit\Framework\TestCase;
use App\ServiceContainer;

class ServiceContainerTest extends TestCase
{
    /** @test */
    public function can_it_bind_service()
    {
        $service = new \StdClass();

        ServiceContainer::bind('example', $service);

        $this->assertContains($service, ServiceContainer::$registry);
    }
}