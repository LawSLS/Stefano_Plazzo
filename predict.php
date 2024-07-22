<?php

use App\ModelDVF;

require_once __DIR__ . '/vendor/autoload.php';


$dbUser = 'root' ;
$dbPwd = 'root';

// CRÉE LE MODÈLE À ENTRAINER
$model = new ModelDVF($pdoDb = new PDO('mysql:host=localhost; dbname=db_sp', $dbUser, $dbPwd));

// CHARGE LE MODÈLE SAUVEGARDÉ
$model->loadSavedModel('dvf_model_84.rbx');

// LANCE UNE PRÉDICTION AVEC type de voie, cp, type logement, superficie, nb pièces, superficie terrain
$value = $model->predict(['avenue', '75001', 'Appartement', 100, 6, 0]);

// AFFICHE LA PRÉVISION
echo "Notre I.A. a estimé votre bien à $value euros (attendu 600 000)\n";


