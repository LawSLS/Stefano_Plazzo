<?php 
namespace App\Service;


use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\PersistentModel;
use Rubix\ML\Persisters\Filesystem;


/**
 * Modèle ML pour le traitement de donnée DVF françaises
 */
class ModelDVF {

    // DOSSIER DE DESTINATION DES MODÈLES SAUVEGARDÉS
    const DIR_MODELS            = '../saved_models';
    
    private ?PersistentModel $estimator = null;

    private string $filename = 'dvf_model_84.rbx';

    function loadSavedModel(){
       
        $this->estimator = PersistentModel::load(new Filesystem(self::DIR_MODELS . '/' . $this->filename));

    }

    /**
     * Lance une prédiction à partir des données fournies
     *
     * @param array $datas Données à utiliser pour la prédiction
     * @return float Projection obtenue
     */
    function predict(array $datas):float {

        // GÉNÈRE UN DATASET
        $dataset = new Unlabeled([$datas]);
        $predictions = $this->estimator->predict($dataset);
        

        return round($predictions[0], 2);
    }
}