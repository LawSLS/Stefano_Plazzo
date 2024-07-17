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
       
        $min_area = 0;
        $max_area = PHP_INT_MAX;

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $min_area = $form->get('min_area')->getData() ?? 0;
            $max_area = $form->get('max_area')->getData() ?? PHP_INT_MAX;
        }
        $propertyAssets = $em->getRepository(ParisValeurFonciere::class)->findAll();
        $result = [];

        foreach ($propertyAssets as $property) {
            
            if($property->getSurfaceReelleBati()>= $min_area && $property->getSurfaceReelleBati()<= $max_area)
            {
                $result[] = $property;
            }
        }
     
        $session->set('filtered_properties', $result);
        // $filteredProperties = $session->get('filtered_properties', null);
        /* if ($filteredProperties === null) {
            $propertyAssets = $em->getRepository(ParisValeurFonciere::class)->findAll();
        } else {
            $propertyAssets = $filteredProperties;
        } */
     
        return $this->render('home/index.html.twig', [
            'filterAreaForm' => $form->createView(),
            'filterArea' => $result,
        ]);
    }

    #[Route('/home/clear-filters', name: 'app_home_clear_filters')]
    public function clearFilters(SessionInterface $session): Response
    {
        $session->remove('filtered_properties');

        return $this->redirectToRoute('app_home');
    }
}

