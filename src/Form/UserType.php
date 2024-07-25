<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles', ChoiceType::class, [
                "multiple" => true,
                "expanded" => true,
                "choices" => ['ROLE_USER' => 'ROLE_USER',
                 'ROLE_ADMIN' => 'ROLE_ADMIN',
                 'ROLE_SUPER_ADMIN' => 'ROLE_SUPER_ADMIN']
            ])
            ->add('password')
            ->add('telephone')
            ->add('no_voie_user')
            ->add('voie_user')
            ->add('type_voie_user')
            ->add('code_postal_user')
            ->add('country')
            ->add('commune_user')
            ->add('code_departement_user')
            ->add('is_active')
            ->add('nom')
            ->add('prenom')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
