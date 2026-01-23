<?php

namespace App\Classes\Characters\Heroes;

use App\Logs\Logger;
use App\Classes\Characters\Character;
use App\Classes\GameObjects\Weapon;
use App\Classes\GameObjects\WeaponBag;

class Hero extends Character {

    private WeaponBag|null $weaponBag = null;

    public function __construct()
    {
        parent::__construct();
        $this->weaponBag = new WeaponBag();
    }

    public function pickUpWeapon(Weapon $weapon): void//TODO I stopped here, the topic is picking up the weapon
    {
        // echo "Picking up weapon...\n";
        $this->weaponBag->addWeapon($weapon);
        $heroClassName = $this->getClassName();
        $weaponName = $weapon->getWeaponClassName();
        Logger::getInstance()->log($heroClassName . " picked up a " . $weaponName);
    }

}