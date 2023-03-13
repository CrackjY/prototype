<?php

namespace App\DataFixtures;

use App\Entity\User\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Création d'un user "normal"
        $user = new User();
        $user->setEmail("user@bookapi.com");
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "1234"));
        $manager->persist($user);

        // Création d'un user admin
        $userAdmin = new User();
        $userAdmin->setEmail("admin@bookapi.com");
        $userAdmin->setRoles(["ROLE_ADMIN"]);
        $userAdmin->setPassword($this->userPasswordHasher->hashPassword($userAdmin, "123456"));
        $manager->persist($userAdmin);

        // Création des auteurs.
//        $listAuthor = [];
//        for ($i = 0; $i < 10; $i++) {
//            // Création de l'auteur lui-même.
//            $author = new Author();
//            $author->setFirstName("Prénom " . $i);
//            $author->setLastName("Nom " . $i);
//            $manager->persist($author);
//
//            // On sauvegarde l'auteur créé dans un tableau.
//            $listAuthor[] = $author;
//        }
//
//        for ($i = 0; $i < 20; $i++) {
//            $book = new Book();
//            $book->setTitle("Titre " . $i);
//            $book->setCoverText("Quatrième de couverture numéro : " . $i);
//            $book->setAuthor($listAuthor[array_rand($listAuthor)]);
//            $manager->persist($book);
//        }

        $manager->flush();
    }
}