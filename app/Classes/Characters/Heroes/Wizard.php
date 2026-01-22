<?php

namespace App\Classes\Characters\Heroes;

use Andor\HeroesAndMonsters3\logs\Logger;
use App\Classes\Characters\Heroes\Hero;
use App\Classes\GameObjects\Magic;

class Wizard extends Hero {

    private int $health = 150;

    private Magic|null $magic = null;

    public function learnMagic(Magic $magic): void
    {
        $this->magic = $magic;
        Logger::getInstance()->log("Wizard learned new magic.");
    }

    

}