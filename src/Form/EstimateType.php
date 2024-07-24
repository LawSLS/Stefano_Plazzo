<?php

namespace App\Form;

use App\Entity\ParisValeurFonciere;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EstimateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type_voie', TextType::class,['attr' => ['class' => 'w-100']])
            ->add('code_postal', TextType::class,['attr' => ['class' => 'w-100']])
            ->add('surface_reelle_bati', TextType::class,['attr' => ['class' => 'w-100']])
            ->add('nb_pieces', TextType::class,['attr' => ['class' => 'w-100']])
            ->add('surface_terrain', TextType::class,['attr' => ['class' => 'w-100']])
            ->add('type_local', ChoiceType::class,
            ['choices' => [
                'Appartement' => 'Appartement',
                'Maison' => 'Maison',
            ]],
            ['attr' => ['class' => 'w-25']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ParisValeurFonciere::class,
        ]);
    }
}
