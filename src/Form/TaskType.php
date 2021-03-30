<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class TaskType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('title', TextType::class, array(
            'label' => 'titulo'
        ))
        ->add('content', TextareaType::class, array(
            'label' => 'contenido'
        ))
        ->add('priority', ChoiceType::class, array(
            'label' => 'prioridad',
            'choices' => array(
                'alta' => 'high',
                'media' => 'medium',
                'baja' => 'low'
            )
        ))
        ->add('hours', NumberType::class, array(
            'label' => 'Horas presupuestadas'
        ))
        ->add('submit', SubmitType::class, array(
            'label' => 'Crear'
        ));
    }
}