<?php

declare(strict_types=1);

namespace App\Dice;

use PHPUnit\Framework\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Testing Dice class.
 */
class DiceTest extends KernelTestCase
{
    /**
     * Check that roll() returns the right amount of dices.
     */
    public function testRoll()
    {
        $dice = new Dice(10);

        $exp = 10;
        $res = $dice->roll();
        $this->assertSame($exp, $res);
    }

    /**
     * Check that getLastRoll() returns the right dices.
     */
    public function testGetLastRoll()
    {
        $controller = new Dice();

        $exp = $controller->roll();
        $res = $controller->getLastRoll();
        $this->assertSame($exp, $res);
    }
}
