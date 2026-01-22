<?php

namespace App\Classes\GameObjects;

use App\Logs\Logger;

class GameObject {

    /**
     * This is the ultimate parent class. Every time when a child object is created, this creation 
     * needs to be logged, with the child class name. For this we use the Logger class and late
     * static binding. So the end result is something like this: 'A new Warrior has been created.'
     */
    public function __construct()
    {
        $className = basename(str_replace('\\', '/', static::class));
        Logger::getInstance()->log("A new " . $className . " has been created.");
    }

}