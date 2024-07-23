<?php

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

// Pour les tests créer une db "db_sp_test" avec la table paris_valeur_fonciere

class HomeControllerTest extends WebTestCase
{
    protected static $client;

    public static function setUpBeforeClass(): void
    {
        // Simulation de requetes HTTP
        self::$client = static::createClient();
    }

    public function testFilterByArea()
    {
       
        $client = self::$client;

        // Requete get avec les filtres
        $client->request('GET', '/home/filter', [
            'min_area' => 50,
            'max_area' => 100
        ]);

        // code 200 ?
        $this->assertResponseIsSuccessful();

        $crawler = $client->getCrawler();


        // Crawler nous permet de lire notre template html
        $crawler->filter('.card')->each(function ($node) {
            // on va sur notre card et on prend le troisieme element pour prendre le texte de celui-ci
            $surfaceText = $node->filter('.card-text')->eq(2)->text(); 
            // regex pour prendre un texte qui commence par surface suivie de chiffres
            preg_match('/Surface : (\d+)/', $surfaceText, $matches);

            
            $this->assertCount(2, $matches, "La surface n'a pas pu être extraite du texte : $surfaceText");

            // convertir la(es) valeurs de $matches en entier
            $surface = intval($matches[1]);
            $this->assertGreaterThanOrEqual(50, $surface, "La surface ($surface) est inférieure à la surface minimale.");
            $this->assertLessThanOrEqual(100, $surface, "La surface ($surface) est supérieure à la surface maximale.");
        });
    }

    
}
