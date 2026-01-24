<?php

namespace App\Classes;

use App\Classes\Characters\Heroes\Hero;
use App\Classes\Characters\Monsters\Monster;
use App\Logs\Logger;

class FightManager {

    private Hero $hero;

    private Monster $monster;

    //TODO make this figher1, fighter2 and make fight more generic
    //they should attack with the same function name, and the damage amount should be calculated 
    //also with the same function name???
    public function __construct(Hero $hero, Monster $monster)
    {
        $this->hero = $hero;
        $this->monster = $monster;
    }

    public function fight(): void
    {
        echo "The fight begins between Hero and Monster!" . PHP_EOL;

        while($this->hero->isAlive() && $this->monster->isAlive()) {

            $attacker = $this->whoWillAttack();

            if ($attacker instanceof Hero) {
                $this->heroAttacks();
            } else {
                $this->monsterAttacks();
            }
        }
        $this->announceWinner();
    }

    private function whoWillAttack(): Hero|Monster
    {
        //Get random number between 0 and 100
        $rand = rand(0, 100);

        if ($rand <= 50) {
            return $this->hero;
        } else {
            return $this->monster;
        }
    }

    private function heroAttacks(): void
    {
        $heroAttack = $this->hero->getAttackType();
        $attackType = $heroAttack['attackType'];
        $damage = $heroAttack['damage'];
        $this->monster->decreaseHealth($damage);
        Logger::getInstance()->log(
            $this->hero->getClassName() 
            . " used " 
            . $attackType 
            . " and caused " 
            . $damage 
            . " damage to " 
            . $this->monster->getClassName() 
            . "."
        );
    }

    private function monsterAttacks(): void
    {
        $monsterAttack = $this->monster->getAttackType();
        $attackType = $monsterAttack['attackType'];
        $damage = $monsterAttack['damage'];
        $this->hero->decreaseHealth($damage);
        Logger::getInstance()->log(
            $this->monster->getClassName() 
            . " used " 
            . $attackType 
            . " and caused " 
            . $damage 
            . " damage to " 
            . $this->hero->getClassName() 
            . "."
        );
    }

    private function announceWinner(): void
    {
        if ($this->hero->isAlive()) {
            
            Logger::getInstance()->log(
                $this->hero->getClassName() 
                . " defeated " 
                . $this->monster->getClassName() 
                . "!"
            );
        } else {
            Logger::getInstance()->log(
                $this->monster->getClassName() 
                . " defeated " 
                . $this->hero->getClassName() 
                . "!"
            );
        }

        echo "The fight has ended." . PHP_EOL;
    }
    
}