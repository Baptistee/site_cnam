<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Utilisateur;

class UtilisateurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $utilisateur0 = new Utilisateur();

        $utilisateur0->setNom("Hermange")
                    ->setPrenom("Julien")
                    ->setLogin("jhe")
                    ->setPwd("jhe")
                    ->setRole(0);

         $manager->persist($utilisateur0);

         $utilisateur1 = new Utilisateur();

         $utilisateur1->setNom("Bacquet")
                     ->setPrenom("Yannick")
                     ->setLogin("yba")
                     ->setPwd("yba")
                     ->setRole(1);
 
          $manager->persist($utilisateur1);

          $utilisateur2 = new Utilisateur();

          $utilisateur2->setNom("Bruccoleri")
                      ->setPrenom("Alois")
                      ->setLogin("abr")
                      ->setPwd("abr")
                      ->setRole(2);
  
           $manager->persist($utilisateur2);

           $utilisateur3 = new Utilisateur();

           $utilisateur3->setNom("Blanchet")
                       ->setPrenom("Baptiste")
                       ->setLogin("bbl")
                       ->setPwd("bbl")
                       ->setRole(3);
   
            $manager->persist($utilisateur3);

        $manager->flush();
    }
}
