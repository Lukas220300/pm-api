<?php


namespace unit;


use App\Entity\KeyPair;
use PHPUnit\Framework\TestCase;

class KeyPairTest extends TestCase
{

    public function testKeyPair():void
    {
        $keyPair = new KeyPair();

        $this->assertIsObject($keyPair, 'Asserting keyPair to be an object.');
    }
}