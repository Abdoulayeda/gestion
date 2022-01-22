<?php

namespace App\DataFixtures;

use App\Entity\Employe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 30; ++$i) {
            $employe = new Employe();
            $employe->setPrenom($faker->firstName())
                    ->setNom($faker->lastName())
                    ->setEmail($faker->email())
                    ->setTelephone($faker->phoneNumber())
                    ->setPost($faker->name())
                    ->setSection($faker->name())
                    ->setSalaire($faker->randomNumber(6))
                    ->setPhoto($faker->imageUrl(400, 240));

            $manager->persist($employe);
        }

        $manager->flush();
    }
}
