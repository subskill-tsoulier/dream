<?php

namespace App\Form;

use App\Entity\Job;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'bg-dark text-danger border border-danger p-2 rounded m-2 w-100',
                    'placeholder' => "Titre de l'annonce",
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'bg-dark text-danger border border-danger p-2 rounded m-2 w-100',
                    'placeholder' => "Description",
                ]
            ])
            ->add('profession', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'bg-dark text-danger border border-danger p-2 rounded m-2 w-100',
                    'placeholder' => "Métier : ",
                ]
            ])
            ->add('contract', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'bg-dark text-danger border border-danger p-2 rounded m-2 w-100',
                    'placeholder' => "Contrat : ",
                ]
            ])
            ->add('country', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'bg-dark text-danger border border-danger p-2 rounded m-2 w-100',
                    'placeholder' => "Pays : ",
                ]
            ])
            ->add('city', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'bg-dark text-danger border border-danger p-2 rounded m-2 w-100',
                    'placeholder' => "Ville : ",
                ]
            ])
            ->add('zip_code', IntegerType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'bg-dark text-danger border border-danger p-2 rounded m-2 w-100',
                    'placeholder' => "Code postal : ",
                ]
            ])
            ->add('company', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'bg-dark text-danger border border-danger p-2 rounded m-2 w-100',
                    'placeholder' => "Entreprise",
                ]
            ])
            ->add('salary', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'bg-dark text-danger border border-danger p-2 rounded m-2 w-100',
                    'placeholder' => "Salaire : ",
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
