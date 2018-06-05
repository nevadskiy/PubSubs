<?php

namespace App;

class ServiceContainer {

    protected $registry = [];

    public static function bind(string $alias, $dependency)
    {
        self::$registry[$alials] = $dependency;
    }

    public static function get()
    {
       
    }
}