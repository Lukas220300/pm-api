<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);


        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);
        $user->setEmail('lukas.schoenbeck@gmx.de');
        $user->setPassword($this->userPasswordHasher->hashPassword($user, 'root'));
        $manager->persist($user);

        $manager->flush();
    }
}
