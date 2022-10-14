<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");

        for ($i = 0; $i < 1200; $i++) {
            $job = new Job();
            $job->setTitle($faker->words(3, true));
            $job->setDescription($faker->text(150));
            $job->setProfession($faker->jobTitle());
            $job->setContract($faker->words(1, true));
            $job->setCountry('Frnce');
            $job->setCity($faker->region());
            $job->setZipCode($faker->numberBetween(100, 9800) . "0");
            $job->setCompany($faker->company());
            $job->setSalary($faker->numberBetween(35000, 120000));
            $manager->persist($job);
        }
        $manager->flush();
    }
}
