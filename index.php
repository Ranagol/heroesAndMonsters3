<?php

use App\Classes\GameObjects\GameObject;
use App\Classes\GameObjects\Lance;
use App\Logs\Logger;
use App\Classes\GameObjects\Magic;
use App\Classes\GameObjects\Sword;
use App\Classes\Characters\Heroes\Warrior;
use App\Classes\Characters\Heroes\Wizard;

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










Logger::getInstance()->log('Game ended');



