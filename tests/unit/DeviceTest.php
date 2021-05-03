<?php


namespace unit;


use App\Entity\Device;
use PHPUnit\Framework\TestCase;

class DeviceTest extends TestCase
{

    public function testDevice():void
    {
        $firstLogin = new \DateTime('now');
        $lastLogin = new \DateTime('now');

        $device = new Device();
        $device->setDeviceIdentifier('jhjH43H78dhjh37DHJb');
        $device->setFirstLogin($firstLogin);
        $device->setLastLogin($lastLogin);

        $this->assertIsObject($device, 'Asserting device to be an object');
        $this->assertEquals('jhjH43H78dhjh37DHJb', $device->getDeviceIdentifier(), 'Asserting deviceIdentifier to be jhjH43H78dhjh37DHJb FOUND: ' . $device->getDeviceIdentifier() . '.');
        $this->assertIsObject($device->getFirstLogin(), 'Asserting firstLogin to be an object');
        $this->assertEquals($firstLogin->getTimestamp(), $device->getFirstLogin()->getTimestamp(), 'Asserting timestamp of firstLogin to be '. $firstLogin->getTimestamp() . ' FOUND: ' . $device->getFirstLogin()->getTimestamp() . '.');
        $this->assertIsObject($device->getLastLogin(), 'Asserting lastLogin to be an object');
        $this->assertEquals($lastLogin->getTimestamp(), $device->getLastLogin()->getTimestamp(), 'Asserting timestamp of lastLogin to be '. $lastLogin->getTimestamp() . ' FOUND: ' . $device->getLastLogin()->getTimestamp() . '.');

    }
}