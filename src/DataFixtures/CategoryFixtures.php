<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $fakerCategory = Factory::create();
        $fakerCategory->addProvider(new \Xylis\FakerCinema\Provider\Movie($fakerCategory));
        foreach (range(1, 5) as $i) {
            $category = new Category();
            $category->setName($fakerCategory->movieGenre);
            $manager->persist($category);
            $this->addReference('category_' . $i, $category);
        }
        $manager->flush();
    }
}
