<?php

namespace App\Classes\GameObjects;

use App\Exceptions\MaxWeaponNrExceededException;
use App\Exceptions\NoWeaponException;

class WeaponBag extends GameObject {

    private array $weapons = [];

    private int $activeWeaponIndex = 0;

    private int $maxNumberOfWeapons = 2;

    public function __construct()
    {
        //this is deliberatly empty
    }

    public function addWeapon(Weapon $weapon): void 
    {
        if (count($this->weapons) < $this->maxNumberOfWeapons) {
            $this->weapons[] = $weapon;
        } else {
            throw new MaxWeaponNrExceededException();
        }
    }

    public function getActiveWeapon(): Weapon 
    {
        return $this->weapons[$this->activeWeaponIndex];
    }

    public function switchWeapon(): void 
    {
        if (count($this->weapons) == 0) {
            throw new NoWeaponException();
        }
    }



}