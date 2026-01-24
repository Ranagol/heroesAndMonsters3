<?php

namespace App\Classes\GameObjects;

use App\Classes\GameObjects\Weapon;

class Lance extends Weapon {

    private int $damage = 15;

    public function getDamage(): int
    {
        return $this->damage;
    }

}