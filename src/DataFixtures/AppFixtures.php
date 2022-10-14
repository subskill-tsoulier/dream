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

        

        for ($i = 0; $i < 3600; $i++) {
            $pro = ["Développeur Front", "Développeur Back","Développeur Full Stack",  "DevOps", "Ingénieur", "SysAdmin"];
            $profession = $pro[array_rand($pro, 1)];

            $cont = ["CDI", "Alternance", "CDD", "Stage", "Intérim", "Freelance"];
            $contract = $cont[array_rand($cont, 1)];

            $com = ["Meta", "Subskill", "AWS", "Apple", "Thales", "Capgemini", "Festina"];
            $company = $com[array_rand($com, 1)];

            $job = new Job();
            $job->setTitle($faker->words(3, true));
            $job->setDescription($faker->text(150));
            $job->setProfession($profession);
            $job->setContract($contract);
            $job->setCountry('France');
            $job->setCity($faker->region());
            $job->setZipCode($faker->numberBetween(100, 9800) . "0");
            $job->setCompany($company);
            $job->setSalary($faker->numberBetween(35000, 120000));
            $job->setRef($faker->uuid());
            $job->setUpdatedTime($faker->numberBetween(1665743488, 1666952869));
            $job->setCreatedAt($faker->numberBetween(1664533669, 1665743488));
            $manager->persist($job);
        }
        $manager->flush();
    }
}
