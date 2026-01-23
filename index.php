<?php

use App\Classes\Characters\Heroes\Warrior;
use App\Classes\Characters\Heroes\Wizard;
use App\Classes\Characters\Monsters\Dragon;
use App\Classes\Characters\Monsters\Spider;
use App\Classes\FightManager;
use App\Classes\GameObjects\GameObject;
use App\Classes\GameObjects\Lance;
use App\Classes\GameObjects\Magic;
use App\Classes\GameObjects\Sword;
use App\Logs\Logger;




require __DIR__ . '/vendor/autoload.php';

echo '<h1>Heroes and Monsters 3</h1>';

Logger::getInstance()->log('Game started');

/**
 * creating characters and game objects
 */
echo '<h2>Creating characters and game objects</h2>';
$warrior = new Warrior();
$wizard = new Wizard();

$sword = new Sword();
$lance = new Lance();
$magic = new Magic();
$sword2 = new Sword();

$dragon = new Dragon();
$spider = new Spider();

/**
 * Warrior actions: picking up weapons, showing active weapon, switching weapon, dropping weapon
 */
echo '<h2>Warrior actions</h2>';
$warrior->pickUpWeapon($sword);
$warrior->pickUpWeapon($lance);
// $warrior->showActiveWeapon();
// $warrior->switchWeapon();
// $warrior->showActiveWeapon();
// $warrior->switchWeapon();
// $warrior->showActiveWeapon();
// $warrior->showAllWeapons();

// $droppedWeapon = $warrior->dropWeapon();
// $warrior->showAllWeapons();

/**
 * Wizard learns new magic
 */
echo '<h2>Wizard actions</h2>';
$wizard->learnMagic($magic);

/**
 * Fight
 */
echo '<h2>The epic fight</h2>';
$fightManager = new FightManager($warrior, $dragon);
$fightManager->fight();







Logger::getInstance()->log('Game ended');



