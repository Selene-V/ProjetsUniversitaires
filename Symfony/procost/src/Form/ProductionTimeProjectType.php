<?php

namespace App\Form;

use App\Entity\Employee;
use App\Entity\ProductionTime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductionTimeProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('employee', EntityType::class, [
                'class' => Employee::class,
                'choice_label' => function ($employee){
                    return ucfirst($employee->getPrenom()) . ' ' . strtoupper($employee->getNom());
                }
            ])
            ->add('nbHeures', NumberType::class, [
                'label' => 'Nombre d\'heures'
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) : void
    {
        $resolver->setDefaults([
            'data_class' => ProductionTime::class,
        ]);
    }
}
