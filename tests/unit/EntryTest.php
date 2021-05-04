<?php


namespace unit;


use App\Entity\Entry;
use PHPUnit\Framework\TestCase;

class EntryTest extends TestCase
{

    public function testEntry():void
    {
        $content = openssl_random_pseudo_bytes(1000);
        $date = new \DateTime('now');

        $entry = new Entry();
        $entry->setContent($content);
        $entry->setCreated($date);
        $entry->setLastModify($date);

        $this->assertIsObject($entry, 'Asserting entry to be an object.');
        $this->assertIsString($entry->getContent(), 'Asserting string to be a string.');
        $this->assertEquals($content, $entry->getContent(), 'Asserting content to be ' . $content . ' FOUND: ' . $entry->getContent() . '.');
        $this->assertIsObject($entry->getCreated(), 'Asserting created to be an object.');
        $this->assertEquals($date->getTimestamp(), $entry->getCreated()->getTimestamp(), 'Asserting created to be ' . $date->getTimestamp() . ' FOUND: ' . $entry->getCreated()->getTimestamp() . '.');
        $this->assertIsObject($entry->getLastModify(), 'Asserting lastModify to be an object.');
        $this->assertEquals($date->getTimestamp(), $entry->getLastModify()->getTimestamp(), 'Asserting lastModify to be ' . $date->getTimestamp() . ' FOUND: ' . $entry->getLastModify()->getTimestamp() . '.');
    }

}