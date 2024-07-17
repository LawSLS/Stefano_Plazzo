<?php

namespace App\Form;

use App\Entity\ParisValeurFonciere;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AreaFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nature_mutation')
            ->add('no_voie')
            ->add('b_t_q')
            ->add('type_voie')
            ->add('code_voie')
            ->add('voie')
            ->add('code_postal')
            ->add('commune')
            ->add('section')
            ->add('nb_lots')
            ->add('code_type_local')
            ->add('surface_reelle_bati')
            ->add('nb_pieces')
            ->add('surface_terrain')
            ->add('description')
            ->add('d_p_e')
            ->add('prix_vente')
            ->add('images')
            ->add('date_creation_annonce', null, [
                'widget' => 'single_text',
            ])
            ->add('date_desactivation_annonce', null, [
                'widget' => 'single_text',
            ])
            ->add('date_mutation')
            ->add('valeur_fonciere')
            ->add('code_departement')
            ->add('code_commune')
            ->add('type_local')
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ParisValeurFonciere::class,
        ]);
    }
}
