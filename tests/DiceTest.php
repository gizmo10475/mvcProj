<?php

declare(strict_types=1);

namespace App\Dice;

use PHPUnit\Framework\TestCase;

// use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Testing Dice class.
 */
class DiceTest extends TestCase
{
    /**
     * Checking roll and getLastRoll.
     */
    public function testRoll()
    {
        $dice = new Dice();

        $res = $dice->roll();
        $exp = $dice->getLastRoll();
        $this->assertSame($exp, $res);
    }

    /**
     * Checking rollTwo and getLastRoll.
     */
    public function testRollTwo()
    {
        $dice = new Dice();

        $res = $dice->rollTwo();
        $exp = $dice->getLastRoll();
        $this->assertSame($exp, $res);
    }

}
