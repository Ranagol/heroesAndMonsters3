<?php

require __DIR__ . '/vendor/autoload.php';//this must be the first thing

echo '<h1>Heroes and Monsters 3</h1>';

$logger = \App\Logs\Logger::getInstance();
$logger->log('Game started');