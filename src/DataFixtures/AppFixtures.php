<?php

namespace App\DataFixtures;

use App\Factory\ScreencastFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne([
            'email' => 'ryan@example.com',
            'password' => 'admin',
            'roles' => ['ROLE_NGLAYOUTS_ADMIN']
        ]);

        ScreencastFactory::createMany(25);

        $manager->flush();
    }
}
