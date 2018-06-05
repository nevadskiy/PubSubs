<?php

namespace App;

class ServiceContainer {

    protected static $registry = [];

    public static function bind(string $alias, $dependency)
    {
        self::$registry[$alias] = $dependency;
    }

    public static function get($alias)
    {
        if (!isset(self::$registry[$alias])) {
            throw new \InvalidArgumentException("Service {$alias} is not binded");
        }

        return self::$registry[$alias];
    }
}