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


$warrior = new Warrior();
$wizard = new Wizard();

$sword = new Sword();
$lance = new Lance();
$magic = new Magic();



// throw new \App\Exceptions\NoWeaponException();
// throw new \App\Exceptions\MaxWeaponNrExceededException();

// $logger = \App\Logs\Logger::getInstance();
// $logger->log('Game started');


Logger::getInstance()->log('Game ended');



