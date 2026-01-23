<?php

namespace App\Classes\Characters\Heroes;

use App\Logs\Logger;
use App\Classes\Characters\Heroes\Hero;
use App\Classes\GameObjects\Weapon;
use App\Classes\GameObjects\WeaponBag;

class Warrior extends Hero {

    private int $health = 100;

    private string|null $heroClassName = null;

    private WeaponBag|null $weaponBag = null;

    public function __construct()
    {
        parent::__construct();
        $this->weaponBag = new WeaponBag();
        $this->heroClassName = $this->getClassName();
    }

    public function pickUpWeapon(Weapon $weapon): void
    {
        $this->weaponBag->addWeapon($weapon);

        $weaponName = $weapon->getWeaponClassName();
        Logger::getInstance()->log($this->heroClassName . " picked up a " . $weaponName);
    }

    public function showAllWeapons(): void
    {
        $allWeapons = $this->weaponBag->getWeapons();
        if (count($allWeapons) == 0) {
            Logger::getInstance()->log($this->heroClassName . " has no weapons in the bag.");
            return;
        }
        foreach ($allWeapons as $weapon) {
            $weaponName = $weapon->getWeaponClassName();
            Logger::getInstance()->log($this->heroClassName . " has a " . $weaponName . " in the bag.");
        }
    }

    public function showActiveWeapon(): void
    {
        // return $this->weaponBag->getActiveWeapon();
        $activeWeapon = $this->weaponBag->getActiveWeapon();
        if (!$activeWeapon) {
            Logger::getInstance()->log($this->heroClassName . " has no active weapon.");
            return;
        }
        $weaponName = $activeWeapon->getWeaponClassName();
        Logger::getInstance()->log($this->heroClassName . "'s active weapon is a " . $weaponName);
    }

    public function switchWeapon(): void
    {
        $this->weaponBag->switchWeapon();
        Logger::getInstance()->log($this->heroClassName . " switched weapon.");
    }

}