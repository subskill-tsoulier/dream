<?php

namespace App\Form;

use App\Entity\JobSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('profession', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Métier',
                    'class' => 'border border-danger bg-dark text-danger rounded rounded-pill w-75 p-2',
                ]
            ])
            ->add('contract', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Contrat',
                    'class' => 'border border-danger bg-dark text-danger rounded rounded-pill w-75 p-2',
                ]
            ])
            ->add('company', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Entreprise',
                    'class' => 'border border-danger bg-dark text-danger rounded rounded-pill w-75 p-2',
                ]
            ])
            ->add('salaire', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Salaire',
                    'class' => 'border border-danger bg-dark text-danger rounded rounded-pill w-75 p-2',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobSearch::class,
            'method' => 'get',
            'csrf_protection' => false,
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
