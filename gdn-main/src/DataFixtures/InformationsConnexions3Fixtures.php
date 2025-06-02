<?php

namespace App\DataFixtures;

use App\Entity\InformationsConnexions3;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InformationsConnexions3Fixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $info = new InformationsConnexions3();
        $info->setLogin('root');
        $info->setMotdePasse('root'); 

        $manager->persist($info);
        $manager->flush();
    }
}