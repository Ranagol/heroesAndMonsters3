<?php

namespace Tests\Unit\Classes\Characters\Heroes;

use PHPUnit\Framework\TestCase;
use App\Classes\GameObjects\Lance;
use App\Classes\GameObjects\Sword;
use App\Classes\Characters\Heroes\Warrior;
use App\Exceptions\MaxWeaponNrExceededException;

class WarriorTest extends TestCase
{
    private Warrior $warrior;
    private Sword $sword;
    private Lance $lance;

    protected function setUp(): void
    {
        $this->warrior = new Warrior();
        $this->sword = new Sword();
        $this->lance = new Lance();
    }

    public function testWarriorCreated(): void
    {
        $this->expectOutputRegex('/A new Warrior has been created\./');
        $this->assertInstanceOf(Warrior::class, $this->warrior);
    }

    public function testPickUpWeapon(): void
    {
        $this->expectOutputRegex('/picked up a Sword/');
        $this->warrior->pickUpWeapon($this->sword);
    }

    public function testThirdWeaponPickUp(): void
    {
        $this->expectOutputRegex('/Cannot pick up weapon: bag is full!/');
        $this->warrior->pickUpWeapon($this->sword);
        $this->warrior->pickUpWeapon($this->lance);
        $this->warrior->pickUpWeapon(new Sword());
    }

    public function testDropWeapon(): void
    {
        $this->expectOutputRegex('/dropped his Lance/');
        $this->warrior->pickUpWeapon($this->lance);
        $dropped = $this->warrior->dropWeapon();
        $this->assertInstanceOf(Lance::class, $dropped);
    }

    public function testShowAllWeaponsEmptyBag(): void
    {
        $this->expectOutputRegex('/has no weapons in the bag/');
        $this->warrior->showAllWeapons();
    }

    public function testShowAllWeaponsWhenHasSword(): void
    {
        $this->expectOutputRegex('/Sword/');
        $this->warrior->pickUpWeapon($this->sword);
        $this->warrior->showAllWeapons();
    }

    public function testShowActiveWeaponButNoWeapon(): void
    {
        $this->expectOutputRegex('/has no active weapon/');
        $this->warrior->showActiveWeapon();
    }

    public function testShowActiveWeaponWithWeapon(): void
    {
        $this->expectOutputRegex('/Sword/');
        $this->warrior->pickUpWeapon($this->sword);
        $this->warrior->showActiveWeapon();
    }

    public function testSwitchWeaponWhenNoWeapons(): void
    {
        $this->expectOutputRegex('/cannot switch weapon: no weapons in the bag./');
        $this->warrior->switchWeapon();
    }

    public function testSwitchWeaponWhenOneWeapon(): void
    {
        $this->expectOutputRegex('/cannot switch weapon: only one weapon in the bag./');
        $this->warrior->pickUpWeapon($this->sword);
        $this->warrior->switchWeapon();
    }

    public function testSwitchWeaponSuccessfully(): void
    {
        $this->expectOutputRegex('/switched weapon/');
        $this->warrior->pickUpWeapon($this->sword);
        $this->warrior->pickUpWeapon($this->lance);
        $this->warrior->switchWeapon();
    }

    public function testGetAttackTypeWhenUnarmed(): void
    {
        $this->expectOutputRegex('/A new Warrior has been created/');
        $attackType = $this->warrior->getAttackType();
        $expectedArray = [
            'attackType' => 'Unarmed',
            'damage' => 1,
        ];
        $this->assertEquals($expectedArray, $attackType);
    }

    public function testGetAttackTypeWithWeapon(): void
    {
        $this->expectOutputRegex('/A new Warrior has been created/');
        $this->warrior->pickUpWeapon($this->sword);
        $attackType = $this->warrior->getAttackType();
        $expectedArray = [
            'attackType' => 'Sword',
            'damage' => $this->sword->getDamage(),
        ];
        $this->assertEquals($expectedArray, $attackType);
    }
}




