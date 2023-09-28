<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail(bin2hex(random_bytes(5)).'@gmail.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword(bin2hex(random_bytes(10)));
        $manager->persist($user);

        $manager->flush();
    }
}
