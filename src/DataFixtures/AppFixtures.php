<?php

namespace App\DataFixtures;

use App\Entity\Bureau;
use App\Entity\Categorie;
use App\Entity\Grade1;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i=1; $i<=10;$i++)
        {
            $bureau =new Bureau();

            $bureau->setNumero($i);
            $manager->persist($bureau);
        }

        for ($i=1; $i<=10;$i++)
        {
            $categorie =new Categorie();

            $categorie->setLibelle($faker->name());
            $manager->persist($categorie);
        }

        for ($i=1; $i<=10;$i++)
        {
            $grade =new Grade1();

            $grade->setLibelle($faker->name());
            $manager->persist($grade);
        }
        $manager->flush();
       
        // $product = new Product();
        // $manager->persist($product);

       
    }
}
