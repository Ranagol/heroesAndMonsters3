<?php

namespace Andor\HeroesAndMonsters3\logs;

class Logger {
    private static $instance;// 1-Make a private static $instance property. This will store the instance of this class.

    private function __construct() {//2-make the __construct private. This way nobody will be able to do $counter = new Counter();
        
    }

    static function getInstance() {//3-cre-ate a static creation method. If there is no $counter object already in the $instance, it will create one and return it. If there is alredy a $counter object in the $instance, then it will simply return this $counter.
        if (self::$instance == null) {
            self::$instance = new Logger();
        }

        return self::$instance;
    }

    public function log(String $text): void
    {
        echo '<br>' . $text . '<br>';
    }
}
