<?php

namespace App\Form;

use App\Entity\Visiteur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Billet;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\BilletType;

class VisiteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Prenom', TextType::class, [
                'attr' =>[
                    'placeholder'=>"Votre prénom"
                ]
            ])
            ->add('nom', TextType::class, [
                'attr' =>[
                    'placeholder'=>"Votre nom"
                ]
            ])
            ->add('Email', TextType::class, [
                'attr' =>[
                    'placeholder'=>"Votre email"
                ]
            ])
            ->add('total')
            ->add('nbBillet', CollectionType::class, array(
                'entry_type' => BilletType::class,
                'entry_options' => array('label' => false),
                'allow_add' =>true,
                'by_reference' => false
            ))

        ->add('Envoyer', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visiteur::class,
        ]);
    }
}
