<?php

namespace App\Classes\Characters;

use App\Classes\GameObjects\GameObject;

class Character extends GameObject {

    private int $health;

    public function getHealth(): int
    {
        return $this->health;
    }

    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    public function decreaseHealth(int $amount): void
    {
        $this->health -= $amount;
    }

}