<?php

namespace App\DataFixtures;

use App\Entity\ParisValeurFonciere;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use PDO;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $dbUser = "root";
        $dbPwd = "root";

        $pdoDb = new PDO('mysql:host=127.0.0.1:3306; dbname=recup_db', $dbUser, $dbPwd);
        $smt = $pdoDb->prepare('SELECT * FROM paris_valeur_fonciere');
        $smt->execute();
        $immos = $smt->fetchAll();

        foreach ($immos as $immo) {
            $bienImmo = new ParisValeurFonciere();
            $bienImmo
            ->setNatureMutation($immo['nature_mutation'])
            ->setDateMutation($immo['date_mutation'])
            ->setValeurFonciere($immo['valeur_fonciere'])
            ->setNoVoie($immo['no_voie'])
            ->setBTQ($immo['b_t_q'])
            ->setTypeVoie($immo['type_voie'])
            ->setCodeVoie($immo['code_voie'])
            ->setVoie($immo['voie'])
            ->setCodePostal($immo['code_postal'])
            ->setCommune($immo['commune'])
            ->setCodeDepartement($immo['code_departement'])
            ->setCodeCommune($immo['code_commune'])
            ->setSection($immo['section'])
            ->setNbLots($immo['nb_ lots'])
            ->setCodeTypeLocal($immo['code_type_local'])
            ->setTypeLocal($immo['type_local'])
            ->setSurfaceReelleBati($immo['surface_reelle_bati'])
            ->setNbPieces($immo['nb_pieces'])
            ->setSurfaceTerrain($immo['surface_terrain']);

            $manager->persist($bienImmo);
        }

        $manager->flush(); 
    }
/***** Autre manière de faire en ligne de commande (ici cmd windows) ********

"C:\MAMP\bin\mysql\bin\mysql.exe" -u root -p db_sp < "C:\Users\andre\Desktop\paris_valeur_fonciere.sql"

C:\MAMP\bin\mysql\bin\mysql.exe -> chemin de mysql sur votre machine
-u root -> -u pour utilisateur et root pour le nom d'utilisateur que vous avez definit sur mysql
-p db_sp -> -p vous demandera votre mot de passe et enfin notre le nom de notre bdd db_sp
C:\Users\andre\Desktop\paris_valeur_fonciere.sql -> chemin du fichier sur votre machine

*/
 }
