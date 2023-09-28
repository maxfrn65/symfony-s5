<?php

namespace App\DataFixtures;

use App\Entity\Nationality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class NationalityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (range(1,9) as $i) {
            $nationality = new Nationality();
            $nationality->setNationality('nationality ' . $i);
            $this->addReference('nationality_' . $i, $nationality);
            $manager->persist($nationality);
        }
        $manager->flush();
    }
}
