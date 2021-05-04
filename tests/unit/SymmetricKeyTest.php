<?php


namespace unit;


use App\Entity\SymmetricKey;
use PHPUnit\Framework\TestCase;

class SymmetricKeyTest extends TestCase
{

    public function testSymmetricKey():void
    {

        $key = openssl_random_pseudo_bytes(32);
        $date = new \DateTime('now');
        $salt = '6z7GKa9kpDN7KC3UCW1Hi';

        $symmetricKey = new SymmetricKey();
        $symmetricKey->setSalt($salt);
        $symmetricKey->setKey($key);
        $symmetricKey->setCreated($date);

        $this->assertIsObject($symmetricKey, 'Asserting symmetricKey to be an Object');
        $this->assertIsObject($symmetricKey->getCreated(), 'Asserting created to be an Object');
        $this->assertEquals($date->getTimestamp(), $symmetricKey->getCreated()->getTimestamp(), 'Asserting timestamp of given dateTime is ' . $date->getTimestamp() . ' FOUND: ' . $symmetricKey->getCreated()->getTimestamp() . '.');
        $this->assertIsString($symmetricKey->getKey(), 'Asserting key to be a string');
        $this->assertEquals($key, $symmetricKey->getKey(), 'Asserting key is ' . $key . ' FOUND: ' . $symmetricKey->getKey() . '.');
        $this->assertIsString($symmetricKey->getSalt(), 'Asserting salt to be a string');
        $this->assertEquals($salt, $symmetricKey->getSalt(), 'Asserting salt is ' . $salt . ' FOUND: ' . $symmetricKey->getSalt() . '.');
    }

}