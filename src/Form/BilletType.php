<?php

namespace App\Form;

use App\Entity\Billet;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class BilletType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', TextType::class, [
                'attr' =>[
                    'placeholder'=>"Votre prénom"
                ]
            ])
            ->add('nom', TextType::class, [
                'attr' =>[
                    'placeholder'=>"Votre nom"
                ]
            ])
            ->add('datedenaissance', DateType::class)
            ->add('visiteur', CollectionType::class)
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Billet::class,
        ]);
    }
}
