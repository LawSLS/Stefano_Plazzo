<?php

namespace App\Controller;

use App\Entity\ParisValeurFonciere;
use App\Form\AreaFilterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        $titlePage = "Stefano Plazzo";

        return $this->render('home/index.html.twig', [
            'titlePage' => $titlePage,
        ]);
    }

    #[Route('/home', name: 'app_home')]
    public function filterByArea(EntityManagerInterface $em, Request $request, SessionInterface $session) : Response
    {
        $form = $this->createForm(AreaFilterType::class);
        $form->handleRequest($request);
        $propertyAssets = $em->getRepository(ParisValeurFonciere::class)->findAll();
        $filteredProperties = $propertyAssets;
       
        $min_area = 0;
        $max_area = PHP_INT_MAX;

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $min_area = $data['min_area'] ?? 0;
            $max_area = $data['max_area'] ?? PHP_INT_MAX;

            $filteredProperties = array_filter($filteredProperties, function($property) use ($min_area, $max_area) {
                $surface = $property->getSurfaceReelleBati();
                return $surface >= $min_area && $surface <= $max_area;
            });
        }
     
     
        return $this->render('home/index.html.twig', [
            'filterAreaForm' => $form->createView(),
            'filters' => $filteredProperties,
        ]);
    }
}

