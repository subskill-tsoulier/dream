<?php

namespace App\Form;

use App\Entity\JobSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('profession', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'choices' => [
                    'Choisir une métier' => '',
                    'Ingénieur' => 'Ingénieur',
                    'Développeur Full Stack' => 'Développeur Full Stakc',
                    'Développeur Back' => 'Développeur Back',
                    'Développeur Front' => 'Développeur Front',
                    'DevOps' => 'DevOps',
                    'SysAdmin' => 'SysAdmin',
                ],
                'attr' => [
                    'class' => 'form-select form-select-sm bg-dark text-danger p-2 my-2',
                ]
            ])
            ->add('contract', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'choices' => [
                    'Choisir une contrat' => '',
                    'CDI' => 'CDI',
                    'CDD' => 'CDD',
                    'Alternance' => 'Alternance',
                    'Intérim' => 'Intérim',
                    'Freelance' => 'Freelance',
                    'Stage' => 'Stage',
                ],
                'attr' => [
                    'class' => 'form-select form-select-sm bg-dark text-danger p-2 my-2',
                ]
            ])
            ->add('company', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'choices' => [
                    'Choisir une entreprise' => '',
                    'Subskill' => 'Subskill',
                    'Amazon Web Service' => 'AWS',
                    'Thales' => 'Thales',
                    'Capgemini' => 'Capgemini',
                    'Festina' => 'Festina',
                ],
                'attr' => [
                    'class' => 'form-select form-select-sm bg-dark text-danger p-2 my-2',
                ]
            ])
            ->add('filterOrder', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'choices' => [
                    'Trier les offres par date' => '',
                    'Afficher les dernières offres' => 'ASC',
                    'Afficher les offres les plus anciennes' => 'DESC',
                ],
                'attr' => [
                    'class' => 'form-select form-select-sm bg-dark text-danger p-2 my-2',
                ]
            ])
            ->add('filterOrderAlphabetic', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'choices' => [
                    'Trier les offres par ordre alphabétique' => '',
                    'Ranger de A à Z' => 'ASC',
                    'Ranger de Z à A' => 'DESC',
                ],
                'attr' => [
                    'class' => 'form-select form-select-sm bg-dark text-danger p-2 my-2',
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
