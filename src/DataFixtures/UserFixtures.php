<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $usersData = [
            [
                'email' => 'user1@example.com',
                'password' => 'password123',
                'telephone' => '0123456789',
                'no_voie_user' => '123',
                'voie_user' => 'Rue de la Paix',
                'type_voie_user' => 'Rue',
                'code_postal_user' => '75000',
                'country' => 'France',
                'commune_user' => 'Paris',
                'code_departement_user' => '75',
                'is_active' => true,
            ],
            // [
            //     'email' => 'user2@example.com',
            //     'password' => 'password456',
            //     'telephone' => '0987654321',
            //     'no_voie_user' => '456',
            //     'voie_user' => 'Avenue des Champs-Élysées',
            //     'type_voie_user' => 'Avenue',
            //     'code_postal_user' => '75008',
            //     'country' => 'France',
            //     'commune_user' => 'Paris',
            //     'code_departement_user' => '75',
            //     'is_active' => true,
            // ],
            // [
            //     'email' => 'user3@example.com',
            //     'password' => 'password789',
            //     'telephone' => '0234567890',
            //     'no_voie_user' => '789',
            //     'voie_user' => 'Boulevard Haussmann',
            //     'type_voie_user' => 'Boulevard',
            //     'code_postal_user' => '75009',
            //     'country' => 'France',
            //     'commune_user' => 'Paris',
            //     'code_departement_user' => '75',
            //     'is_active' => true,
            // ],
            // [
            //     'email' => 'user4@example.com',
            //     'password' => 'passwordabc',
            //     'telephone' => '0345678901',
            //     'no_voie_user' => '987',
            //     'voie_user' => 'Place de la Concorde',
            //     'type_voie_user' => 'Place',
            //     'code_postal_user' => '75001',
            //     'country' => 'France',
            //     'commune_user' => 'Paris',
            //     'code_departement_user' => '75',
            //     'is_active' => true,
            // ],
            // [
            //     'email' => 'user5@example.com',
            //     'password' => 'passworddef',
            //     'telephone' => '0456789012',
            //     'no_voie_user' => '654',
            //     'voie_user' => 'Rue du Faubourg Saint-Honoré',
            //     'type_voie_user' => 'Rue',
            //     'code_postal_user' => '75002',
            //     'country' => 'France',
            //     'commune_user' => 'Paris',
            //     'code_departement_user' => '75',
            //     'is_active' => true,
            // ],
            // [
            //     'email' => 'user6@example.com',
            //     'password' => 'passwordghi',
            //     'telephone' => '0567890123',
            //     'no_voie_user' => '321',
            //     'voie_user' => 'Avenue Montaigne',
            //     'type_voie_user' => 'Avenue',
            //     'code_postal_user' => '75016',
            //     'country' => 'France',
            //     'commune_user' => 'Paris',
            //     'code_departement_user' => '75',
            //     'is_active' => true,
            // ],
            // [
            //     'email' => 'user7@example.com',
            //     'password' => 'passwordjkl',
            //     'telephone' => '0678901234',
            //     'no_voie_user' => '135',
            //     'voie_user' => 'Rue Saint-Honoré',
            //     'type_voie_user' => 'Rue',
            //     'code_postal_user' => '75003',
            //     'country' => 'France',
            //     'commune_user' => 'Paris',
            //     'code_departement_user' => '75',
            //     'is_active' => true,
            // ],
            // [
            //     'email' => 'user8@example.com',
            //     'password' => 'passwordmno',
            //     'telephone' => '0789012345',
            //     'no_voie_user' => '246',
            //     'voie_user' => 'Boulevard Saint-Germain',
            //     'type_voie_user' => 'Boulevard',
            //     'code_postal_user' => '75006',
            //     'country' => 'France',
            //     'commune_user' => 'Paris',
            //     'code_departement_user' => '75',
            //     'is_active' => true,
            // ],
            // [
            //     'email' => 'user9@example.com',
            //     'password' => 'passwordpqr',
            //     'telephone' => '0890123456',
            //     'no_voie_user' => '789',
            //     'voie_user' => 'Avenue de l\'Opéra',
            //     'type_voie_user' => 'Avenue',
            //     'code_postal_user' => '75009',
            //     'country' => 'France',
            //     'commune_user' => 'Paris',
            //     'code_departement_user' => '75',
            //     'is_active' => true,
            // ],
            // [
            //     'email' => 'user10@example.com',
            //     'password' => 'passwordstu',
            //     'telephone' => '0901234567',
            //     'no_voie_user' => '111',
            //     'voie_user' => 'Rue Royale',
            //     'type_voie_user' => 'Rue',
            //     'code_postal_user' => '75008',
            //     'country' => 'France',
            //     'commune_user' => 'Paris',
            //     'code_departement_user' => '75',
            //     'is_active' => true,
            // ],
        ];

        foreach ($usersData as $userData) {
            $user = new User();
            $user->setEmail($userData['email']);
            $user->setRoles(['ROLE_USER']); // Peut être ajusté selon tes besoins
            $hashedPassword = $this->passwordHasher->hashPassword($user, $userData['password']);
            $user->setPassword($hashedPassword);
            $user->setTelephone($userData['telephone']);
            $user->setNoVoieUser($userData['no_voie_user']);
            $user->setVoieUser($userData['voie_user']);
            $user->setTypeVoieUser($userData['type_voie_user']);
            $user->setCodePostalUser($userData['code_postal_user']);
            $user->setCountry($userData['country']);
            $user->setCommuneUser($userData['commune_user']);
            $user->setCodeDepartementUser($userData['code_departement_user']);
            $user->setActive($userData['is_active']);

            // Persister l'utilisateur
            $manager->persist($user);
        }

        // Flush pour enregistrer tous les utilisateurs
        $manager->flush();
    }
}
