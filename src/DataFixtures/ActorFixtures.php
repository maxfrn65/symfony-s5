<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor
    ;

class ActorFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {

        // Génère les données pour 10 acteurs avec un firstName et un lastName réaliste dans des variables $firstName et $lastName
        $firstName = ['Jean', 'Pierre', 'Paul', 'Jacques', 'Marie', 'Julie', 'Julien', 'Jeanne', 'Pierre', 'Pauline','Marie'];
        $lastName = ['Dupont', 'Durand', 'Duchemin', 'Duchesse', 'Duc', 'Ducroc', 'Ducrocq', 'Ducroq', 'Ducro', 'Ducros', 'Ducroix'];

        // Génère moi 10 objets Actor fictifs dans un foreach
        foreach (range(1, 10) as $i) {
            $actor = new Actor();
            $actor->setFirstName($firstName[$i]);
            $actor->setLastName($lastName[$i]);
            $manager->persist($actor); // "expose" l'objet à Doctrine pour qu'il soit enregistré en BDD
            $this->addReference('actor_'.$i, $actor); // permet de garder une référence à l'objet pour le récupérer dans une autre fixture
        }

        $manager->flush();
    }
}