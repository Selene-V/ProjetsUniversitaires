<?php

namespace App\Form;

use App\Entity\Employee;
use App\Entity\Metier;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'label' => 'Prenom'
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Adresse email'
            ])
            ->add('metier', EntityType::class, [
                'class' => Metier::class,
                'choice_label' => function ($metier){
                    return $metier->getNom();
                }
            ])
            ->add('coutHoraire', NumberType::class, [
                'label' => 'Coût horaire'
            ])
            ->add('dateEmbauche', DateType::class, [
                'label' => 'Date d\'embauche',
                'widget' => 'single_text',
                'input' => 'datetime'
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) : void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
