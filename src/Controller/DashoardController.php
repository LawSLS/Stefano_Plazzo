<?php

namespace App\Controller;

use App\Entity\ParisValeurFonciere;
use App\Entity\User;
use App\Form\PropertyAdType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Knp\Component\Pager\PaginatorInterface;
use ReflectionClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


#[IsGranted('ROLE_ADMIN')]
//#[IsGranted('ROLE_SUPER_ADMIN')]
class DashoardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(EntityManagerInterface $em): Response
    {

        $title = "Dashboard Admin";
        $bienRespository = $em->getRepository(ParisValeurFonciere::class);

        $biens = $bienRespository->findAll();
        
        $reflect = new ReflectionClass($biens[0]);
        $properties = $reflect->getProperties();
        $headBien = [];
        foreach($properties as $property){
            $headBien[] = $property->getName();
        }

        $userRepository = $em->getRepository(User::class);
        $users = $userRepository->findAll();

        $reflect = new ReflectionClass($users[0]);
        $properties = $reflect->getProperties();
        $headUser = [];
        foreach($properties as $property){
            $headUser[] = $property->getName();
        }

        $biensSlice = array_slice($biens, -5, 5);
        //dd($biens);
        
        return $this->render('dashboard/index.html.twig', [
            'titlePage' => $title,
            'biens' => $biens,
            'headBien' => $headBien,
            'users' => $users,
            'headUser' => $headUser,
            'biensSlice' => $biensSlice
        ]);
    }

    #[Route('/dashboard/biens', name: 'app_dashboard_bien')]
    public function biens (EntityManagerInterface $em, PaginatorInterface $paginator, Request $request): Response
    {

        $title = "Dashboard Admin biens";
        $bienRespository = $em->getRepository(ParisValeurFonciere::class);

        $biens = $bienRespository->findAll();
        
        $pagination = $paginator->paginate(
            $biens,
            $request->query->getInt('page', 1),
            15
        );
        //dd($pagination);
        return $this->render('dashboard/biens.html.twig', [
            'titlePage' => $title,
            'biens' => $biens,
            'pagination' => $pagination,
        ]);
    }

    #[Route('/dashboard/bien/{id}', name: 'app_show_bien')]
    public function showBien(EntityManagerInterface $em, ParisValeurFonciere $bien): Response
    {
        $title = 'Bien';

        return $this->render('dashboard/showBien.html.twig', [
            'bien' => $bien,
            'titlePage' => $title,
        ]);
    }

    #[Route('/dashboard/bien/{id}/edit', name: 'app_edit_bien')]
    public function editBien(ParisValeurFonciere $bien, EntityManagerInterface $em, Request $request): Response
    {
        $title = 'Edit bien n° ';

        $form = $this->createForm(PropertyAdType::class, $bien);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($bien);
            $em->flush();
            return $this->redirectToRoute('app_dashboard');
        }


        return $this->render('dashboard/editBien.html.twig', [
            'titlePage' => $title,
            'form' => $form,
            'bien' => $bien,
        ]);
    }

    #[Route('/dashboard/bien/delete/{id}', name: 'app_delete_bien')]
    public function deleteBien(ParisValeurFonciere $bien, EntityManagerInterface $em, Request $request): Response
    {
        $em->remove($bien);
        $em->flush();

        return $this->redirectToRoute('app_dashboard_bien');
    }

    #[Route('/dashboard/user', name: 'app_dashboard_user')]
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


        return $this->render('dashboard/users.html.twig', [
            'titlePage' => $title,
            'users' => $users,
            'head' => $head,
        ]);
    }

    #[Route('/dashboard/user/{id}', name:'app_show_user')]
    public function showUser(User $user, EntityManagerInterface $em): Response
    {
        $title = 'User';
        $userRepository = $em->getRepository(User::class);
        $users = $userRepository->findAll();

        $reflect = new ReflectionClass($users[0]);
        $properties = $reflect->getProperties();
        $head = [];
        foreach($properties as $property){
            $head[] = $property->getName();
        }

        return $this->render('dashboard/showUser.html.twig', [
            'titlePage' => $title,
            'user' => $user,
            'head' => $head,
        ]);
    }

    #[Route('/dashboard/user/{id}/edit', name: 'app_edit_user')]
    public function editUser(User $user, EntityManagerInterface $em, Request $request):Response
    {

        $title = 'Edit User';

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('app_dashboard');
        }

        

        return $this->render('dashboard/editUser.html.twig', [
            'titlePage' => $title,
            'form' => $form,
        ]);
    }
}
