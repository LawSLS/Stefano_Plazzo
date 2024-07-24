<?php

namespace App\Form;

use App\Entity\ParisValeurFonciere;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyAdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nature_mutation', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('no_voie', TextType::class,['attr' => ['class' => 'w-50']])
            ->add('b_t_q', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('type_voie', TextType::class,['attr' => ['class' => 'w-50']])
            ->add('code_voie', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('voie', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('code_postal', TextType::class,['attr' => ['class' => 'w-50']])
            ->add('commune', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('section', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('nb_lots', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('code_type_local', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('surface_reelle_bati', TextType::class,['attr' => ['class' => 'w-50']])
            ->add('nb_pieces', TextType::class,['attr' => ['class' => 'w-50']])
            ->add('surface_terrain', TextType::class,['attr' => ['class' => 'w-50']])
            ->add('description', TextareaType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('d_p_e', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('prix_vente', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('images', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('date_mutation', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('valeur_fonciere', TextType::class,
            ['attr' => ['class' => 'w-50', 'style'=> 'display:none'],
                'label_attr' => ['style' => 'display:none'],
                'required' => false
            ])
            ->add('code_departement', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('code_commune', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('type_local', ChoiceType::class,
            ['choices' => [
                'Appartement' => 'Appartement',
                'Maison' => 'Maison',
            ]],
            ['attr' => ['class' => 'w-50']])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
                'attr' => ['style' => 'display:none'],
                'label_attr' => ['style' => 'display:none']
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
