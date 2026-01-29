<?php

namespace App\Classes\Characters\Heroes;

use App\Classes\Characters\Character;
use App\Classes\GameObjects\Weapon;

/**
 * All Warriors and Wizards must extend this class, and must have these abstract methods.
 */
abstract class Hero extends Character {

    public function __construct()
    {
        parent::__construct();
    }

    abstract public function getAttackType(); 

    abstract public function pickUpWeapon(Weapon $weapon): void;
}


