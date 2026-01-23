<?php

namespace App\Classes\GameObjects;

use App\Exceptions\MaxWeaponNrExceededException;
use App\Exceptions\NoWeaponException;

class WeaponBag extends GameObject {

    /**
     * @var array Weapon[]
     */
    public array $weapons = [];

    private int $activeWeaponIndex = 0;

    private int $maxNumberOfWeapons = 2;

    public function __construct()
    {
        //this is deliberatly empty, we don't want to log every WeaponBag creation
    }

    public function addWeapon(Weapon $weapon): void 
    {
        if (count($this->weapons) < $this->maxNumberOfWeapons) {
            $this->weapons[] = $weapon;
        } else {
            throw new MaxWeaponNrExceededException();
        }
    }

    /**
     * Removes and returns the active weapon from the bag.
     *
     * @return Weapon
     */
    public function removeActiveWeapon(): Weapon
    {
        if (count($this->weapons) == 0) {
            throw new NoWeaponException();
        }

        //Get the active weapon
        $activeWeapon = $this->weapons[$this->activeWeaponIndex];

        //Remove the active weapon from the weapons array
        array_splice($this->weapons, $this->activeWeaponIndex, 1);

        return $activeWeapon;

    }

    public function getActiveWeapon(): Weapon | null 
    {
        if (count($this->weapons) == 0) {
            return null;
        }
    
        return $this->weapons[$this->activeWeaponIndex];
    }

    public function switchWeapon(): void 
    {
        if (count($this->weapons) == 0) {
            throw new NoWeaponException();
        }
        
        /**
         * This will reverse items in array. ['apple', 'orange'] will become ['orange', 'apple']
         */
        $this->weapons = array_reverse($this->weapons);
    }

    public function getWeapons(): array 
    {
        return $this->weapons;
    }


}