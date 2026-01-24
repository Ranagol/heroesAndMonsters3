<?php

namespace App\Classes\Characters\Monsters;

use App\Classes\Characters\Character;

/**
 * All Dragons and Spider must be childs of the Monster class.
 */
abstract class Monster extends Character {

    protected int $health;

    public array $attack1;

    public array $attack2;

    /**
     * This will be used for all Monsters, to decide whether they will use attack1 or attack2
     *
     * @return integer
     */
    protected function randomGenerator(): int
    {
        return rand(1,2);
    }

    abstract public function getAttackType(): array;

}