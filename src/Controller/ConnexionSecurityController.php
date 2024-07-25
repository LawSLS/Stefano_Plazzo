<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security as SecurityBundleSecurity;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ConnexionSecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, SecurityBundleSecurity $security): Response
    {
        $user = $security->getUser();


        if ($user) {
            if ($security->isGranted("ROLE_ADMIN")) {
                return $this->redirectToRoute('app_dashboard');
            }elseif ($security->isGranted("ROLE_USER")) {
                return $this->redirectToRoute('app_home');
            }
        }
        
        
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();


        return $this->render('connexionsecurity/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'show_login_buttons' => false,
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
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
