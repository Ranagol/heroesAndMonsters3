<?php

namespace App\Classes\GameObjects;

abstract class Weapon extends GameObject {

    private int $damage;

    public function getWeaponClassName(): string
    {
        return $this->getClassName();
    }

    abstract public function getDamage(): int;
}