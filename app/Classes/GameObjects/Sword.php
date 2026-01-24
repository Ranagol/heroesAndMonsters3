<?php

namespace App\Classes\GameObjects;

use App\Classes\GameObjects\Weapon;

class Sword extends Weapon {

    private int $damage = 10;

    public function getDamage(): int
    {
        return $this->damage;
    }

}