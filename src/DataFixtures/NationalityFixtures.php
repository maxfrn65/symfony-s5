<?php

namespace App\DataFixtures;

use App\Entity\Nationality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class NationalityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $fakerNationality = Factory::create();
        foreach (range(1, 9) as $i) {
            $nationality = new Nationality();
            $nationality->setNationality($fakerNationality->country);
            $this->addReference('nationality_' . $i, $nationality);
            $manager->persist($nationality);
        }
        $manager->flush();
    }
}
