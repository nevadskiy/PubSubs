<?php

namespace App\Events;

class CustomEvent implements EventInterface
{
    public $arg; 

    public function __construct($arg)
    {
        $this->arg = $arg;    
    }
}