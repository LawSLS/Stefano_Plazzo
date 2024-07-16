<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use PDO;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $dbUser = "root";
        $dbPwd = "root";

        $pdoDb = new PDO('mysql:host=localhost; dbname=recup_db', $dbUser, $dbPwd);
        $smt = $pdoDb->prepare('SELECT * FROM paris_valeur_fonciere');
        $smt->execute();
        $arrayImmo = $smt->fetchAll();


        $manager->flush();
    }
}
