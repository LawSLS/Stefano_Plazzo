<?php

namespace App\Controller;

use App\Entity\ParisValeurFonciere;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use ReflectionClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


//#[IsGranted('ROLE_ADMIN')]
//#[IsGranted('ROLE_SUPER_ADMIN')]
class DashoardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashoard')]
    public function index(EntityManagerInterface $em): Response
    {

        $title = "Dashboard Admin";
        $bienRespository = $em->getRepository(ParisValeurFonciere::class);

        $biens = $bienRespository->findAll();
        
        $reflect = new ReflectionClass($biens[0]);
        $properties = $reflect->getProperties();
        $head = [];
        foreach($properties as $property){
            $head[] = $property->getName();
        }


        
        //dd($head);
        

        return $this->render('dashoard/index.html.twig', [
            'titlePage' => $title,
            'biens' => $biens,
            'head' => $head,
        ]);
    }

    #[Route('/dashboard/user', name: 'app_dashoard_user')]
    public function users(EntityManagerInterface $em): Response
    {

        $title = "Dashboard admin users";
        $userRepository = $em->getRepository(User::class);
        $users = $userRepository->findAll();



        return $this->render('dashoard/users.html.twig', [
            'titlePage' => $title,
        ]);
    }
}
