<?php

namespace App\Controller;

use App\Entity\ParisValeurFonciere;
use App\Form\AreaFilterType;
use App\Form\PriceFilterType;
use App\Form\RoomNbFilterType;
use App\Form\ZipFilterType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;



class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(EntityManagerInterface $em, PaginatorInterface $paginator, Request $request): Response
    {

        $imgPath = "https://static.wixstatic.com/media/3997c6_979b9769a23e4aaa8ac2e32c202c79ae~mv2.jpg
        /v1/fill/w_640,h_434,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/3997c6_979b9769a23e4aaa8ac2e32c202c79ae~mv2.jpg";
        $titlePage = "Stefano Plazzo";
        $qb = $em->getRepository(ParisValeurFonciere::class)->createQueryBuilder('p');
        $pagination = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            6
        );

        $properties = $em->getRepository(ParisValeurFonciere::class)->findAll();
      
        
        
        return $this->render('home/index.html.twig', [
            'titlePage' => $titlePage,
            'image' => $imgPath,
            'properties' => $properties,
            'pagination' => $pagination,
        ]);
    }

    #[Route('/home/filter', name: 'app_home_filter')]
    public function filterByArea(EntityManagerInterface $em, Request $request, PaginatorInterface $paginator) : Response
    {
        $form = $this->createForm(AreaFilterType::class);
        $form->handleRequest($request);

        $zipForm = $this->createForm(ZipFilterType::class);
        $zipForm->handleRequest($request);

        $roomForm = $this->createForm(RoomNbFilterType::class);
        $roomForm->handleRequest($request);

        $priceForm = $this->createForm(PriceFilterType::class);
        $priceForm->handleRequest($request);

       
       

        $min_area = $request->query->getInt('min_area', 0);
        $max_area = $request->query->getInt('max_area', PHP_INT_MAX);
        $zip = $request->query->get('zip', '');
        $roomNb = $request->query->get('nb_pieces', 0);
        $min_price = $request->query->getInt('min_price', 0);
        $max_price = $request->query->getInt('max_price', PHP_INT_MAX);

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $min_area = $data['min_area'] ?? 0;
            $max_area = $data['max_area'] ?? PHP_INT_MAX;

            return $this->redirectToRoute('app_home_filter', [
                'min_area' => $min_area,
                'max_area' => $max_area,
                'zip' => $zip,
               
            ]);

        }

        if($zipForm->isSubmitted() && $zipForm->isValid()){
            $data = $zipForm->getData();
            $zip = $data['code_postal'] ?? '';

            return $this->redirectToRoute('app_home_filter', [
                'min_area' => $min_area,
                'max_area' => $max_area,
                'zip' => $zip,
                
            ]);
        }

        if($roomForm->isSubmitted() && $roomForm->isValid()){
            $data = $roomForm->getData();
            $roomNb = $data['nb_pieces'] ?? 0;

            return $this->redirectToRoute('app_home_filter', [
                'min_area' => $min_area,
                'max_area' => $max_area,
                'zip' => $zip,
                'nb_pieces' => $roomNb,
            ]);
        }

        if($priceForm->isSubmitted() && $priceForm->isValid()){
            $data = $priceForm->getData();
            $min_price = $data['min_price'] ?? 0;
            $max_price = $data['max_price'] ?? PHP_INT_MAX;

            return $this->redirectToRoute('app_home_filter', [
                'min_area' => $min_area,
                'max_area' => $max_area,
                'zip' => $zip,
                'min_price' => $min_price,
                'max_price' => $max_price,
            ]);
        }
        
        $filteredProperties = $em->getRepository(ParisValeurFonciere::class)->findAll();
        $result = [];
        foreach ($filteredProperties as $property) {
            $superficie = $property->getSurfaceReelleBati();
            $code_postal = $property->getCodePostal();
            $nb_pieces = $property->getNbPieces();
            $propertyValue = $property->getValeurFonciere();

            
            if (($superficie >= $min_area && $superficie <= $max_area )
            && ($zip === '' || $code_postal === $zip) 
            && ($roomNb === 0 || $nb_pieces === $roomNb) 
            &&($propertyValue >= $min_price && $propertyValue <= $max_price)) {
                $result[] = $property;
            }
        }
     
        $filteredProperties = $result;
        
        $pagination = $paginator->paginate(
            $filteredProperties,
            $request->query->getInt('page', 1),
            12
        );
        
        return $this->render('home/filter.html.twig', [
            'filterAreaForm' => $form->createView(),
            'filterZipForm' => $zipForm->createView(),
            'filterRoomForm' => $roomForm->createView(),
            'filterPriceForm' => $priceForm->createView(),
            'pagination' => $pagination,
            'filters' => $filteredProperties,
        ]);
    }
}

