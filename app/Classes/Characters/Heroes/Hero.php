<?php

namespace App\Classes\Characters\Heroes;

use App\Logs\Logger;
use App\Classes\Characters\Character;
use App\Classes\GameObjects\Weapon;
use App\Classes\GameObjects\WeaponBag;

abstract class Hero extends Character {

    public function __construct()
    {
        parent::__construct();
    }

    abstract public function getAttackType(); 

}