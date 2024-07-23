<?php

namespace App\Form;

use App\Entity\User;
use App\Validator\UniqueEmail;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'John',
                    'class' => 'custom-placeholder',
                ],
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Doe',
                    'class' => 'custom-placeholder',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'attr' => [
                    'placeholder' => 'j.doe@email.com',
                    'class' => 'custom-placeholder',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer une adresse e-mail.',
                    ]),
                    new UniqueEmail(),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
                    'label' => 'Mot de passe',
                    'attr' => [
                        'placeholder' => 'Jd.0101@!',
                        'class' => 'custom-placeholder',
                    ],
                ],
                'second_options' => [
                    'label' => 'Confirmer mot de passe',
                    'attr' => [
                        'placeholder' => 'Jd.0101@!',
                        'class' => 'custom-placeholder',
                    ],
                ],
                'invalid_message' => 'Les mots de passe doivent correspondre.',
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe.',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Le mot de passe doit comporter au moins 6 caractères.',
                        'max' => 4096,
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
