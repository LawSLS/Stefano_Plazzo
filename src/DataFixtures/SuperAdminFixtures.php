<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SuperAdminFixtures extends Fixture implements FixtureGroupInterface
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('superToto@toto.com');
        $user->setRoles(['ROLE_SUPER_ADMIN']);
        
        $hashedPassword = $this->passwordHasher->hashPassword($user, '123');
        $user->setPassword($hashedPassword);

        $manager->persist($user);

        $manager->flush();
    }
    public static function getGroups(): array
    {
        return ['super_admin'];
    } 
}
