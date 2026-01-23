<?php

namespace App\Classes\Characters\Heroes;

use App\Classes\Characters\Heroes\Hero;
use App\Classes\GameObjects\Magic;
use App\Logs\Logger;

class Wizard extends Hero {

    protected int $health = 150;

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

    public function castMagic(): void
    {
        if ($this->magic === null) {
            Logger::getInstance()->log("Wizard has no magic to cast.");
            return;
        }

        Logger::getInstance()->log("Wizard casts magic spell!");
    }

    

}