<?php

namespace App\Form;

use App\Entity\ParisValeurFonciere;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyAdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nature_mutation', TextType::class,[
                'attr' => ['class' => 'w-100'],
                'required' => false
            ])
            ->add('no_voie', TextType::class,[])
            ->add('b_t_q', TextType::class,['required' => false])
            ->add('type_voie', TextType::class,[])
            ->add('code_voie', TextType::class,[ 'required' => false])
            ->add('voie', TextType::class,['required' => false])
            ->add('code_postal', ChoiceType::class,[
                'expanded' => true,
                'choices' => [
                    '75001' => '75001',
                    '75002' => '75002',
                    '75003' => '75003',
                    '75004' => '75004',
                    '75005' => '75005',
                    '75006' => '75006',
                    '75007' => '75007',
                    '75008' => '75008',
                    '75009' => '75009',
                    '75010' => '75010',
                    '75011' => '75011',
                    '75012' => '75012',
                    '75013' => '75013',
                    '75014' => '75014',
                    '75015' => '75015',
                    '75016' => '75016',
                    '75017' => '75017',
                    '75018' => '75018',
                    '75019' => '75019',
                    '75020' => '75020',
                ],
                'attr' => ['class' => 'd-flex flex-wrap']
            ])
            ->add('commune', ChoiceType::class,[
                'choices' => [
                    'Paris 01' => 'Paris 01',
                    'Paris 02' => 'Paris 02',
                    'Paris 03' => 'Paris 03',
                    'Paris 04' => 'Paris 04',
                    'Paris 05' => 'Paris 05',
                    'Paris 06' => 'Paris 06',
                    'Paris 07' => 'Paris 07',
                    'Paris 08' => 'Paris 08',
                    'Paris 09' => 'Paris 09',
                    'Paris 10' => 'Paris 10',
                    'Paris 11' => 'Paris 11',
                    'Paris 12' => 'Paris 12',
                    'Paris 13' => 'Paris 13',
                    'Paris 14' => 'Paris 14',
                    'Paris 15' => 'Paris 15',
                    'Paris 16' => 'Paris 16',
                    'Paris 17' => 'Paris 17',
                    'Paris 18' => 'Paris 18',
                    'Paris 19' => 'Paris 19',
                    'Paris 20' => 'Paris 20',
                ],
                'required' => false
            ])
            ->add('section', TextType::class,['required' => false])
            ->add('nb_lots', TextType::class,[ 'required' => false])
            ->add('code_type_local', TextType::class,['required' => false])
            ->add('surface_reelle_bati', TextType::class,[])
            ->add('nb_pieces', TextType::class,[])
            ->add('surface_terrain', TextType::class,[])
            ->add('description', TextareaType::class,[ 'required' => false])
            ->add('d_p_e', ChoiceType::class,[
                'choices' => [
                    'A' => 'A',
                    'B' => 'B',
                    'C' => 'C',
                    'D' => 'D',
                    'E' => 'E',
                    'F' => 'F',
                    'G' => 'G' 
                ],
                'required' => false
            ])
            ->add('prix_vente', TextType::class,[ 'required' => false])
            ->add('images', FileType::class,[ 'required' => false])
            ->add('date_mutation', DateType::class,[
                'widget' => 'single_text',
                'input'  => 'datetime_immutable',
                'required' => false])
            ->add('valeur_fonciere', TextType::class,[
                'attr' => ['class' => 'w-50', 'style'=> 'display:none'],
                'label_attr' => ['style' => 'display:none'],
                'required' => false
            ])
            ->add('code_departement', TextType::class,['attr' => ['class' => 'w-50'], 'required' => false])
            ->add('code_commune', TextType::class,['attr' => ['class' => 'w-50'], 'data' => '75' ,'required' => false])
            ->add('type_local', ChoiceType::class,[
                'expanded' => true,
                'choices' => [
                'Appartement' => 'Appartement',
                'Maison' => 'Maison'
                ],
                'attr' => ['class' => 'd-flex']
            ])
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
