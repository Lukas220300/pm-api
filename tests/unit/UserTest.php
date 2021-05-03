<?php


namespace unit;


use App\Entity\User;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserTest extends TestCase
{

    public function testUser(): void
    {
        // Preparation
        $user = new User();

        $user->setEmail('test@test.de');
        $user->setRoles(['ROLE_USER', 'ROLE_USER2']);
        $user->setFirstname('John');
        $user->setLastname('Doe');

        // Assertions
        $this->assertIsObject($user, 'Asserting User is an Object');
        $this->assertEquals('test@test.de', $user->getEmail(), 'Asserting user email is "test@test.de" FOUND: ' . $user->getEmail() . '.');
        $this->assertIsArray($user->getRoles(), 'Asserting user roles to be an array.');
        $this->assertCount(2, $user->getRoles(), 'Asserting number of roles to be 2 FOUND: ' . count($user->getRoles()) . '.');
        $this->assertContains('ROLE_USER', $user->getRoles(), 'Asserting user roles contains "ROLE_USER"');
        $this->assertContains('ROLE_USER2', $user->getRoles(), 'Asserting user roles contains "ROLE_USER2"');
        $this->assertEquals('John', $user->getFirstname(), 'Asserting user email is "John" FOUND: ' . $user->getFirstname() . '.');
        $this->assertEquals('Doe', $user->getLastname(), 'Asserting user email is "Doe" FOUND: ' . $user->getLastname() . '.');

    }

}