<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'app_connexion')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // Get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        $customError = null;
        if ($error) {
            // Customize the error message
            $customError = 'Email ou mot de passe incorrect. Veuillez réessayer.';
        }
        // Last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('connexion/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $customError,
        ]);
    }
}
