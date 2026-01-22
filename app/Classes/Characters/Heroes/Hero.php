<?php

namespace App\Classes\Characters\Heroes;

use App\Classes\Characters\Character;
use App\Classes\GameObjects\WeaponBag;

class Hero extends Character {

    private WeaponBag|null $weaponBag = null;

    public function __construct()
    {
        parent::__construct();
        $this->weaponBag = new WeaponBag();
    }

}