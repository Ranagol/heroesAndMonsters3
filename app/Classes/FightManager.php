<?php

namespace App\Classes;

use App\Classes\Characters\Heroes\Hero;
use App\Classes\Characters\Monsters\Monster;
use App\Logs\Logger;

class FightManager {

    private Hero $hero;

    private Monster $monster;

    public function __construct(Hero $hero, Monster $monster)
    {
        $this->hero = $hero;
        $this->monster = $monster;
    }

    public function fight(): void
    {
        echo "The fight begins between Hero and Monster!" . PHP_EOL;

        while($this->hero->isAlive() && $this->monster->isAlive()) {
           $this->hero->decreaseHealth(30);
           $this->monster->decreaseHealth(50);
        }

        if ($this->hero->isAlive()) {
            
            Logger::getInstance()->log(
                $this->hero->getClassName() 
                . " defeated " 
                . $this->monster->getClassName() 
                . "!"
            );
        } else {
            Logger::getInstance()->log("Monster won the fight!");
        }

        echo "The fight has ended." . PHP_EOL;

    }
    
}