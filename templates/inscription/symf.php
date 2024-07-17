<?php


// 1. Injection SQL __ (PHP) Utilisation de requêtes préparées
$query = $entityManager->createQuery('SELECT u FROM App\Entity\User u WHERE u.email = :email');
$query->setParameter('email', $email);
$user = $query->getResult();


// 2. Cross-Site Scripting (XSS) <!-- Utilisation de Twig pour échapper les variables -->

<p>{{ user.username }}</p>


// 3. Cross-Site Request Forgery (CSRF)___(PHP) Ajout d'un token CSRF dans un formulaire Symfony
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;

public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder
        ->add('_token', HiddenType::class, [
            'data' => $this->get('security.csrf.token_manager')->getToken('form_intention'),
        ])
        ->add('submit', SubmitType::class);
}


use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;

public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder
        ->add('_token', HiddenType::class, [
            'data' => $this->get('security.csrf.token_manager')->getToken('form_intention'),
        ])
        ->add('submit', SubmitType::class);
}

