<?php

namespace Tests\Unit\Classes;

use App\Classes\FightManager;
use PHPUnit\Framework\TestCase;
use App\Classes\Characters\Heroes\Warrior;
use App\Classes\Characters\Monsters\Dragon;

class FightManagerTest extends TestCase
{

    public function testFight(): void
    {
        ob_start();
        $warrior = new Warrior();
        $dragon = new Dragon();
        $fightManager = new FightManager($warrior, $dragon);

        //Check if both the warrior or the dragon are alive before the fight
        $this->assertTrue($warrior->isAlive() && $dragon->isAlive());

        $fightManager->fight();
        $output = ob_get_clean();

        //Check if the fight begins log is in the output
        $this->assertStringContainsString("The fight begins between Hero and Monster!", $output);

        //Check if there are attack logs in the output
        $this->assertStringContainsString("damage to", $output);

        //Check if there is a defeated log in the output
        $this->assertStringContainsString("defeated", $output);

        //Check if either the warrior or the dragon is dead at the end of the fight
        $this->assertTrue(!$warrior->isAlive() || !$dragon->isAlive());

        //Check if we have reached successfully the end of the fight
        $this->assertStringContainsString("The fight has ended.", $output);
    }
}