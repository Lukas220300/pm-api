<?php


namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AUserFixtures extends Fixture
{

    public static string $USER1_REF = "user-1";

    protected UserPasswordEncoderInterface $passwordEncoder;

    /**
     * A_UserFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname("John");
        $user->setLastname("Doe");
        $user->setEmail("john.doe@fixtures.de");
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'root'));
        $manager->persist($user);
        $manager->flush();

        $this->addReference(self::$USER1_REF, $user);
    }
}