<?php

declare(strict_types=1);

namespace App\Entity;

use PHPUnit\Framework\TestCase;

// use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Testing Dice class.
 */
class EntityTest extends TestCase
{

    /**
     * Checking getID.
     */
    public function testGetId()
    {
        $book = new Books();

        $exp = $book->getId();
        $this->assertSame(null, $exp);
    }

    /**
     * Checking getName.
     */
    public function testGetName()
    {
        $book = new Books();

        $book->setName("namn");
        $exp = $book->getName();
        $this->assertSame("namn", $exp);
    }


    /**
     * Checking getIsbn.
     */
    public function testGetIsbn()
    {
        $book = new Books();

        $book->setIsbn("namn");
        $exp = $book->getIsbn();
        $this->assertSame("namn", $exp);
    }

    /**
     * Checking getAuthor.
     */
    public function testgetAuthor()
    {
        $book = new Books();

        $book->setAuthor("author");
        $exp = $book->getAuthor();
        $this->assertSame("author", $exp);
    }

    /**
     * Checking setImg.
     */
    public function testsetImg()
    {
        $book = new Books();

        $book->setImg("img");
        $exp = $book->getImg();
        $this->assertSame("img", $exp);
    }


    /**
     * Checking setHighscore.
     */
    public function testsetHighscore()
    {
        $highscore = new Highscore();

        $highscore->setScore("99999");
        $exp = $highscore->getScore();
        $this->assertSame(99999, $exp);
    }

    /**
     * Checking getID from Highscore.
     */
    public function testGetHighscoreId()
    {
        $highscore = new Highscore();

        $exp = $highscore->getId();
        $this->assertSame(null, $exp);
    }
}
