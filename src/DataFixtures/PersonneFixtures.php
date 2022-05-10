<?php

namespace App\DataFixtures;

use App\Entity\Benevole;
use App\Entity\Personne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PersonneFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 5; $i++) {
            $personne = new Personne();
            $personne->setCodepostal('95800')
                ->setNumerotel('0625006434')
                ->setEmail('a@gmail.com')
                ->setMdp('azerty')
                ->setStatut('1');
            $manager->persist($personne);
        }
        $manager->flush();
    }
}
