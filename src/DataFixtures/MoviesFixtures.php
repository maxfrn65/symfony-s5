<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MoviesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $fakerMovie=Factory::create();
        $fakerMovie->addProvider(new \Xylis\FakerCinema\Provider\Movie($fakerMovie));
        foreach (range(1, 30) as $i) {
            $movie = new Movie();
            $movie->setTitle($fakerMovie->movie);
            $movie->setReleaseDate(new \DateTime());
            $movie->setDuration($fakerMovie->runtime);
            $movie->setDescription($fakerMovie->overview);
            $movie->setCategory($this->getReference('category_' . rand(1, 5)));
            $movie->setOnline(rand(0, 1));
            $actors = [];
            foreach (range(1, rand(2, 6)) as $j) {
                $actor = $this->getReference('actor_' . rand(1, 10));
                if (!in_array($actor, $actors)) {
                    $actors[] = $actor;
                    $movie->addActor($actor);
                }
            }
            $manager->persist($movie);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
            ActorFixtures::class,
        ];
    }
}
