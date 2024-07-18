<?php

namespace App\Form;

use App\Entity\ParisValeurFonciere;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyAdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nature_mutation', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('no_voie', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('b_t_q', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('type_voie', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('code_voie', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('voie', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('code_postal', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('commune', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('section', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('nb_lots', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('code_type_local', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('surface_reelle_bati', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('nb_pieces', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('surface_terrain', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('description', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('d_p_e', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('prix_vente', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('images')
            ->add('date_creation_annonce', null, [
                'widget' => 'single_text',
            ])
            ->add('date_desactivation_annonce', null, [
                'widget' => 'single_text',
            ])
            ->add('date_mutation', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('valeur_fonciere', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('code_departement', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('code_commune', null, ['validation_groups' => ['Default','PropertyAd'],])
            ->add('type_local', null, ['validation_groups' => ['Default','PropertyAd'],])
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
            'validation_groups' => ['Default'],
        ]);
    }
}
