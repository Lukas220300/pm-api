<?php


namespace App\DataFixtures;


use App\Entity\EntryType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BEntryTypeFixtures extends Fixture
{

    public static string $TYPE1_REF = "entryType-1";

    public function load(ObjectManager $manager)
    {

        $type = new EntryType();
        $type->setTitle('Login');
        $type->setDescription('Contains a Username and Password field.');
        $this->addReference(self::$TYPE1_REF, $type);
        $manager->persist($type);


        $manager->flush();
    }
}