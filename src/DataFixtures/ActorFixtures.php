<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor
    ;
use Faker\Factory;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        // $firstName = ['Jean','Pierre','Paul','Jacques','Marie','Julie','Julien','Jeanne','Pierre','Pauline','Marie'];
        // $lName = ['Dupont','Durand','Duchemin','Duchesse','Duc','Ducroc','Ducrocq','Ducroq','Ducro','Ducros','Ducroix'];
        $faker = Factory::create('en_US');
        // Génère moi 10 objets Actor fictifs dans un foreach
        foreach (range(1, 10) as $i) {
            $actor = new Actor();
            $actor->setFirstName($faker->firstName());
            $actor->setLastName($faker->lastName());
            $actor->setNationality($this->getReference('nationality_' . rand(1, 9)));
            $manager->persist($actor); // "expose" l'objet à Doctrine pour qu'il soit enregistré en BDD
            $this->addReference('actor_' . $i, $actor);
            // permet de garder une référence à l'objet pour le récupérer dans une autre fixture
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            NationalityFixtures::class,
        ];
    }
}
