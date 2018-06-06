<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use App\ServiceContainer;
use App\Services\EventBus;

abstract class TestCase extends BaseTestCase
{
    public static function setUpBeforeClass()
    {
        // ServiceContainer::bind('EventBus', new EventBus);
    }
}