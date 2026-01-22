<?php

namespace App\Classes\Characters\Heroes;

use App\Logs\Logger;
use App\Classes\Characters\Heroes\Hero;

class Warrior extends Hero {

    private int $health = 100;

    public function __construct()
    {
        parent::__construct();
    }

}