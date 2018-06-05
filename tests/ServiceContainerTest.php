<?php
use PHPUnit\Framework\TestCase;
use App\ServiceContainer;

class ServiceContainerTest extends TestCase
{
    public $service;

    public function setUp()
    {
        $this->service = new \StdClass();
    }

    public function getPropertyValue($name)
    {
       $serviceReflection = new ReflectionClass(ServiceContainer::class);

       $property = $serviceReflection->getProperty($name);
       $property->setAccessible(true);
       return $property->getValue();
    }

    /** @test */
    public function can_it_bind_service()
    {
        ServiceContainer::bind('example', $this->service);

        $registry = $this->getPropertyValue('registry');

        $this->assertContains($this->service, $registry);
    }

    /** @test */
    public function can_it_return_binded_service()
    {
        ServiceContainer::bind('example', $this->service);

        $service = ServiceContainer::get('example');

        $this->assertEquals($service, $this->service);
    }

    /** @test */
    public function expected_wrong_service_retrieving()
    {
        ServiceContainer::bind('example', $this->service);

        $this->expectException(InvalidArgumentException::class);
        $service = ServiceContainer::get('another example');
    }
}