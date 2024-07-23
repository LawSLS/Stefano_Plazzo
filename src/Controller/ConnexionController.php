<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

class ConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'app_connexion')]
    public function index(EntityManagerInterface $em): Response
    {
        $user = $em->getRepository(User::class);
        $role =  $user->find('roles');
        
        if($role == 'ROLE_USER'){
        return $this->redirect('/home');
        }
       
    }

    /** Double factor connexion : 
     * Installez SchebTwoFactorBundle via Composer.
     * Configurez le bundle dans config/packages/scheb_two_factor.yaml.
     * Modifiez votre entité utilisateur pour inclure les champs nécessaires pour 2FA.
     * Créez les routes et templates pour la gestion de la saisie du code 2FA.
     * Configurez le système de sécurité pour intégrer la vérification 2FA.
     * Générez et configurez les secrets pour les utilisateurs.
     */
}
