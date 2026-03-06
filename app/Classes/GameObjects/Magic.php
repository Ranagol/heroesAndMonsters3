<?php

declare(strict_types=1);

namespace App\Classes\GameObjects;

use App\Classes\GameObjects\GameObject;

class Magic extends GameObject {

    private int $damage = 20;

    public function getDamage(): int
    {
        return $this->damage;
    }

}