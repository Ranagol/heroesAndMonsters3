<?php

namespace App\Classes\Characters\Monsters;

use App\Classes\Characters\Character;

abstract class Monster extends Character {

    public array $attack1;

    public array $attack2;

    protected function randomGenerator(): int
    {
        return rand(1,2);
    }

    abstract public function getAttackType(): array;

}