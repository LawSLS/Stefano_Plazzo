<?php

namespace App\Controller;

use App\Entity\ParisValeurFonciere;
use App\Form\EstimateType;
use App\Form\PropertyAdType;
use App\Repository\ParisValeurFonciereRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PropertyAdController extends AbstractController
{
    #[Route('/property/ad', name: 'app_property_ad')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $title = "Publier votre annonce";

        $bien = new ParisValeurFonciere();
        $form = $this->createForm(PropertyAdType::class, $bien);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($bien);
            $em->flush();
        }

        return $this->render('property_ad/index.html.twig', [
            'titlePage' => $title,
            'form' => $form,
        ]);
    }

    #[Route('/estimate', name:'app_estimate')]
    public function estimate(EntityManagerInterface $em) : Response
    {

        $title = 'Estimer votre bien';
        $estimation = new ParisValeurFonciere();
        $form = $this->createForm(EstimateType::class, $estimation);


        return $this->render('property_ad/estimate.html.twig', [
            'titlePage' => $title,
            'form' => $form,

            
        ]);
    }
}
