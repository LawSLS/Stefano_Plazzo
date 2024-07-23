<?php

namespace App\Controller;

use App\Entity\ParisValeurFonciere;
use App\Entity\User;
use App\Form\PropertyAdType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Knp\Component\Pager\PaginatorInterface;
use ReflectionClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

        $userRepository = $em->getRepository(User::class);
        $users = $userRepository->findAll();

        

        //dd($head);
        
        return $this->render('dashoard/index.html.twig', [
            'titlePage' => $title,
            'biens' => $biens,
            'head' => $head,
            'users' => $users,
        ]);
    }

    #[Route('/dashboard/user', name: 'app_dashoard_user')]
    public function users(EntityManagerInterface $em): Response
    {

        $title = "Dashboard admin users";
        $userRepository = $em->getRepository(User::class);
        $users = $userRepository->findAll();

        $reflect = new ReflectionClass($users[0]);
        $properties = $reflect->getProperties();
        $head = [];
        foreach($properties as $property){
            $head[] = $property->getName();
        }


        return $this->render('dashoard/users.html.twig', [
            'titlePage' => $title,
            'users' => $users,
            'head' => $head,
        ]);
    }

    #[Route('/dashboard/biens', name: 'app_dashboard_bien')]
    public function biens (EntityManagerInterface $em, PaginatorInterface $paginator, Request $request): Response
    {

        $title = "Dashboard Admin biens";
        $bienRespository = $em->getRepository(ParisValeurFonciere::class);

        $biens = $bienRespository->findAll();
        
        $reflect = new ReflectionClass($biens[0]);
        $properties = $reflect->getProperties();
        $head = [];
        foreach($properties as $property){
            $head[] = $property->getName();
        }

        $pagination = $paginator->paginate(
            $biens,
            $request->query->getInt('page', 1),
            15
        );

        return $this->render('dashoard/biens.html.twig', [
            'titlePage' => $title,
            'biens' => $biens,
            'head' => $head,
            'pagination' => $pagination,
        ]);
    }

    #[Route('/dashboard/bien/{id}', name: 'app_show_bien')]
    public function showBien(ParisValeurFonciere $bien): Response
    {
        $title = 'Bien';

        return $this->render('dashoard/showBien.html.twig', [
            'bien' => $bien,
            'titlePage' => $title,
        ]);
    }

    #[Route('/dashboard/bien/{id}/edit', name: 'app_edit_bien')]
    public function editBien(ParisValeurFonciere $bien, EntityManagerInterface $em, Request $request): Response
    {
        $title = 'Edit bien';

        $form = $this->createForm(PropertyAdType::class, $bien);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($bien);
            $em->flush();
        }


        return $this->render('dashoard/editBien.html.twig', [
            'titlePage' => $title,
            'form' => $form
        ]);
    }

    #[Route('/dashboard/bien/delete/{id}', name: 'app_delete_bien')]
    public function deleteBien(ParisValeurFonciere $bien, EntityManagerInterface $em, Request $request): Response
    {


        return $this->redirectToRoute('app_dashoard');
    }

}
