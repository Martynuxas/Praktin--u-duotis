<?php

namespace App\Form;

use App\Entity\Roads;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoadsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Road_Number')
            ->add('Road_Name')
            ->add('Section_Start')
            ->add('Section_End')
            ->add('Road_Level')
            ->add('Road_Type')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Roads::class,
        ]);
    }
}
