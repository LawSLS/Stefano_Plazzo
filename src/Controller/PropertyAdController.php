<?php

namespace App\Controller;

use App\Entity\ParisValeurFonciere;
use App\Form\PropertyAdType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PropertyAdController extends AbstractController
{
    #[Route('/property/ad', name: 'app_property_ad')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $title = "Publier votre annonce";

        $bien = new ParisValeurFonciere();
        $form = $this->createForm(PropertyAdType::class, $bien, [
            'validation_groups' => ['PropertyAd'],
        ]);


        return $this->render('property_ad/index.html.twig', [
            'titlePage' => $title,
            'form' => $form,
        ]);
    }

    #[Route('/estimate', name:'app_estimate')]
    public function estimate() : Response
    {

        $title = 'Estimer votre bien';
        $bien = new ParisValeurFonciere();
        $form = $this->createForm(PropertyAdType::class, $bien, [
            'validation_groups' => ['PropertyAd'],
        ]);


        return $this->render('property_ad/estimate.html.twig', [
            'titlePage' => $title,
            'form' => $form->createView(),

            
        ]);
    }
}
