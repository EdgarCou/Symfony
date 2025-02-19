<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use App\Entity\Habit;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class HabitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Chores' => 'chores',
                    'Fitness' => 'fitness',
                    'School/Work' => 'school_work',
                ],
                'label' => 'Category',
            ])
            ->add('text', TextType::class, [
                'label' => 'Habit Name',
            ])
            ->add('difficulty', ChoiceType::class, [
                'choices' => [
                    'Very Easy' => 'very easy',
                    'Easy' => 'easy',
                    'Medium' => 'medium',
                    'Hard' => 'hard',
                ],
            ])
            ->add('color', ColorType::class, [
                'label' => 'Color',
            ])
            ->add('periodicity', ChoiceType::class, [
                'choices' => [
                    'Daily' => 'daily',
                    'Weekly' => 'weekly',
                ],
            ]);

        if ($options['is_group_creator']) {
            $builder->add('type', ChoiceType::class, [
                'choices' => [
                    'Personal' => 'personal',
                    'Group' => 'group',
                ],
                'label' => 'Habit Type',
            ]);
        }

        $builder->add('save', SubmitType::class, [
            'label' => 'Add Habit',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'is_group_creator' => false, 
            'data_class' => Habit::class, 
        ]);
    }
}
