<?php

namespace App\Classes\GameObjects;

use App\Logs\Logger;

class GameObject {

    /**
     * This is the ultimate parent class. Every time when a child object is created, this creation 
     * needs to be logged, with the child class name.
     */
    public function __construct()
    {
        $className = $this->getClassName();
        Logger::getInstance()->log("A new " . $className . " has been created.");
    }

    /**
     * we use late static binding, so we can always get the relevant, actual child class name. 
     * So the end result is something like this: 'A new Warrior has been created.'
     *
     * @return string
     */
    protected function getClassName(): string
    {
        return basename(str_replace('\\', '/', static::class));
    }

}