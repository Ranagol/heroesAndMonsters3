<?php

namespace App\Classes\Characters\Heroes;

use App\Classes\Characters\Heroes\Hero;
use App\Classes\GameObjects\Magic;
use App\Classes\GameObjects\Weapon;
use App\Exceptions\WizardCanNotUseWeaponException;
use App\Logs\Logger;

class Wizard extends Hero {

    protected int $health = 150;

    /**
     * When a Wizard learns a magic, it is stored here
     *
     * @var Magic|null
     */
    private Magic|null $magic = null;

    public function __construct()
    {
        parent::__construct();
    }

    public function learnMagic(Magic $magic): void
    {
        $this->magic = $magic;
        Logger::getInstance()->log("Wizard learned new magic.");
    }

    /**
     * Every character, when attacks, must return an array with attackType and damage.
     *
     * @return array{
     *   attackType: string,
     *   damage: int
     *  }
     */
    public function getAttackType(): array
    {
        if ($this->magic === null) {
            return [
                'attackType' => 'Bare hands',
                'damage' => 1
            ];
        } else {
            $attackType = $this->magic->getClassName();
            $damage = $this->magic->getDamage();
            return [
                'attackType' => $attackType,
                'damage' => $damage
            ];
        }
    }

    /**
     * This is here only because of the task. It was stated, that and exception must be thrown, when
     * the Wizard tries to pick up a weapon.
     *
     * @param Weapon $weapon
     * @return void
     */
    public function pickUpWeapon(Weapon $weapon): void
    {
        try {
            throw new WizardCanNotUseWeaponException();
        } catch (WizardCanNotUseWeaponException $e) {
            Logger::getInstance()->log("Wizard tried to pick up a weapon, which is forbidden.");
        }
    }

    

}