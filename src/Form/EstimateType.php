<?php

namespace App\Form;

use App\Entity\ParisValeurFonciere;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EstimateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type_voie')
            ->add('code_postal')
            ->add('surface_reelle_bati')
            ->add('nb_pieces')
            ->add('surface_terrain')
            ->add('type_local')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ParisValeurFonciere::class,
        ]);
    }
}
