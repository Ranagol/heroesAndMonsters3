<?php

namespace App\Classes\Characters\Monsters;

class Spider extends Monster {

    protected int $health = 150;

    public array $attack1 = [
        'attackType' => 'Biting', 
        'damage' => 8
    ];

    public array $attack2 = [
        'attackType' => 'Hitting',
        'damage' => 5
    ];

    public function getAttackType(): array
    {
        $attackType = $this->randomGenerator();

        if ($attackType === 1) {
            return $this->attack1;
        } else {
            return $this->attack2;
        }
    }
}