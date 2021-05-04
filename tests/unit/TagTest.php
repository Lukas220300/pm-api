<?php


namespace unit;


use App\Entity\Tag;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{

    public function testTag():void
    {
        $title = 'development';

        $tag = new Tag();
        $tag->setTitle($title);

        $this->assertIsObject($tag, 'Asserting tag to be an object.');
        $this->assertIsString($tag->getTitle(), 'Asserting title to be a string');
        $this->assertEquals($title, $tag->getTitle(), 'Asserting title to be ' . $title . ' FOUND: ' . $tag->getTitle() . '.');
    }
}