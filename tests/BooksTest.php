<?php

declare(strict_types=1);

namespace App\Books;

use PHPUnit\Framework\TestCase;

// use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Testing Dice class.
 */
class BooksTest extends TestCase
{

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


}
