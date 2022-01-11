<?php

namespace App\Form;

use App\Entity\JobsDone;
use App\Entity\Roads;
use App\Entity\Jobs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DoneJobsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Road',EntityType::class,['class' => Roads::class,
        'choice_label' => 'Road_Number'])
        ->add('Cipher',EntityType::class,['class' => Jobs::class,
        'choice_label' => 'name' ])
        ->add('SectionStart',EntityType::class,['class' => Roads::class,
        'choice_label' => 'Section_Start' ])
        ->add('SectionEnd',EntityType::class,['class' => Roads::class,
        'choice_label' => 'Section_End' ])
            ->add('Quantity')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobsDone::class,
        ]);
    }
}
