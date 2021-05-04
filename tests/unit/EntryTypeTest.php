<?php


namespace unit;


use App\Entity\EntryType;
use PHPUnit\Framework\TestCase;

class EntryTypeTest extends TestCase
{

    public function testEntryType():void
    {
        $title = 'Password';
        $description = 'A password containing a username and a password';

        $entryType = new EntryType();
        $entryType->setTitle($title);
        $entryType->setDescription($description);

        $this->assertIsObject($entryType, 'Asserting entryType to be an object.');
        $this->assertIsString($entryType->getTitle(), 'Asserting title to be a string.');
        $this->assertEquals($title, $entryType->getTitle(), 'Asserting title to be ' . $title . ' FOUND: ' . $entryType->getTitle() . '.');
        $this->assertIsString($entryType->getDescription(), 'Asserting description to be a string.');
        $this->assertEquals($description, $entryType->getDescription(), 'Asserting description to be ' . $description . ' FOUND: ' . $entryType->getDescription() . '.');

    }
}