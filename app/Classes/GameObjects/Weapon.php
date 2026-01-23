<?php

namespace App\Classes\GameObjects;

class Weapon extends GameObject {

    public function getWeaponClassName(): string
    {
        return $this->getClassName();
    }

}