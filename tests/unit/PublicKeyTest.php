<?php


namespace unit;


use App\Entity\PublicKey;
use PHPUnit\Framework\TestCase;

class PublicKeyTest extends TestCase
{

    public function testPublicKey(): void
    {
        $dateTime = new \DateTime('now');
        $publicKey_openssl = $this->getPublicKey();

        $publicKey = new PublicKey();
        $publicKey->setCreated($dateTime);
        $publicKey->setKey($publicKey_openssl);

        $this->assertIsObject($publicKey, 'Asserting publicKey to be an Object');
        $this->assertIsObject($publicKey->getCreated(), 'Asserting created to be an Object');
        $this->assertEquals($dateTime->getTimestamp(), $publicKey->getCreated()->getTimestamp(), 'Asserting timestamp of given dateTime is ' . $dateTime->getTimestamp() . ' FOUND: ' . $publicKey->getCreated()->getTimestamp() . '.');
        $this->assertIsString($publicKey->getKey(), 'Asserting key to be a string');
        $this->assertEquals($publicKey_openssl, $publicKey->getKey(), 'Asserting key is ' . $publicKey_openssl . ' FOUND: ' . $publicKey->getKey() . '.');
    }

    private function getPublicKey(): string
    {
        $privateKey = openssl_pkey_new();
        return openssl_pkey_get_details($privateKey)['key'];
    }

}