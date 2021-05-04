<?php


namespace unit;


use App\Entity\EntryShareOverlay;
use PHPUnit\Framework\TestCase;

class EntryShareOverlayTest extends TestCase
{

    public function testEntryShareOverlay():void
    {
        $date = new \DateTime('now');

        $entryOverlay = new EntryShareOverlay();
        $entryOverlay->setCreated($date);
        $entryOverlay->setExpire($date);

        $this->assertIsObject($entryOverlay, 'Asserting entryShareOverlay to be an object');
        $this->assertIsObject($entryOverlay->getCreated(), 'Asserting created to be an object');
        $this->assertEquals($date->getTimestamp(), $entryOverlay->getCreated()->getTimestamp(), 'Asserting created to be ' . $date->getTimestamp() . ' FOUND: ' . $entryOverlay->getCreated()->getTimestamp() . '.');
        $this->assertIsObject($entryOverlay->getExpire(), 'Asserting expire to be an object');
        $this->assertEquals($date->getTimestamp(), $entryOverlay->getExpire()->getTimestamp(), 'Asserting expire to be ' . $date->getTimestamp() . ' FOUND: ' . $entryOverlay->getExpire()->getTimestamp() . '.');
    }
}