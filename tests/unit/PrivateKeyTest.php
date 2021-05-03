<?php


namespace unit;


use App\Entity\PrivateKey;
use App\Entity\PublicKey;
use PHPUnit\Framework\TestCase;

class PrivateKeyTest extends TestCase
{
    public function testPrivateKey():void
    {
        $dateTime = new \DateTime('now');
        $privateKey_openssl = $this->getPrivateKey();

        $privateKey = new PrivateKey();
        $privateKey->setCreated($dateTime);
        $privateKey->setKey($privateKey_openssl);
        $privateKey->setSalt('6z7GKa9kpDN7KC3UCW1Hi');

        $this->assertIsObject($privateKey, 'Asserting publicKey to be an Object');
        $this->assertIsObject($privateKey->getCreated(), 'Asserting created to be an Object');
        $this->assertEquals($dateTime->getTimestamp(), $privateKey->getCreated()->getTimestamp(), 'Asserting timestamp of given dateTime is ' . $dateTime->getTimestamp() . ' FOUND: ' . $privateKey->getCreated()->getTimestamp() . '.');
        $this->assertIsString($privateKey->getKey(), 'Asserting key to be a string');
        $this->assertEquals($privateKey_openssl, $privateKey->getKey(), 'Asserting key is ' . $privateKey_openssl . ' FOUND: ' . $privateKey->getKey() . '.');
        $this->assertIsString($privateKey->getSalt(), 'Asserting salt to be a string');
        $this->assertEquals('6z7GKa9kpDN7KC3UCW1Hi', $privateKey->getSalt(), 'Asserting salt is 6z7GKa9kpDN7KC3UCW1Hi FOUND: ' . $privateKey->getSalt() . '.');

        $this->assertTrue(true);
    }


    private function getPrivateKey(): string
    {
        $privateKey = openssl_pkey_new();
        $privateOut  = "";

        openssl_pkey_export($privateKey, $privateOut);

        return $privateOut;
    }


}