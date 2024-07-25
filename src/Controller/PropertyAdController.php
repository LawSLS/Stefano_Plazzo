<?php

namespace App\Controller;

use App\Entity\ParisValeurFonciere;
use App\Form\EstimateType;
use App\Form\PropertyAdType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\ModelDVF;
use PDO;


class PropertyAdController extends AbstractController
{
    #[Route('/property/ad', name: 'app_property_ad')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $title = "Publier votre annonce";

        $bien = new ParisValeurFonciere();
        $form = $this->createForm(PropertyAdType::class, $bien);
        $form->handleRequest($request);

        $data = $form->getData();
        $voie = $data->getTypeVoie();
        $cp = $data->getCodePostal();
        $superficie = $data->getSurfaceReelleBati();
        $pieces = $data->getNbPieces();
        $terrain = $data->getSurfaceTerrain();
        $typeLocal = $data->getTypeLocal();

        $model = new ModelDVF();

        $model->loadSavedModel('dvf_model_84.rbx');
        $value = $model->predict([$voie, $cp, $typeLocal, $superficie, $pieces, $terrain]);

        if ($form->isSubmitted() && $form->isValid()) {
            $bien->setValeurFonciere($value);
            $em->persist($bien);
            $em->flush();
        }

        return $this->render('property_ad/index.html.twig', [
            'titlePage' => $title,
            'form' => $form,
        ]);
    }

    #[Route('/estimate', name:'app_estimate')]
    public function estimate(Request $request, EntityManagerInterface $em) : Response
    {

        $title = 'Estimer votre bien';
        $estimation = new ParisValeurFonciere();
        $form = $this->createForm(EstimateType::class, $estimation);
        $form->handleRequest($request);
        $value = 0;

        if ($form->isSubmitted() && $form->isValid())
        {
        $data = $form->getData();
        $voie = $data->getTypeVoie();
        $cp = $data->getCodePostal();
        $superficie = $data->getSurfaceReelleBati();
        $pieces = $data->getNbPieces();
        $terrain = $data->getSurfaceTerrain();
        $typeLocal = $data->getTypeLocal();
        
        $model = new ModelDVF();

        $model->loadSavedModel('dvf_model_84.rbx');
        $value = $model->predict([$voie, $cp, $typeLocal, $superficie, $pieces, $terrain]);
        }

        
        



        return $this->render('property_ad/estimate.html.twig', [
            'titlePage' => $title,
            'form' => $form,
            'value' => $value,
        ]);
    }
}
