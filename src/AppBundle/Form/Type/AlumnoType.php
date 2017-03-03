<?php

namespace AppBundle\Form\Type;


use AppBundle\Entity\Alumno;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlumnoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('grupo', null)
            ->add('nombre', TextType::class)
            ->add('apellidos', TextType::class)
            ->add('fechaNacimiento', null, [
                'widget' => 'choice', // single_text
                'format' => 'dd-MM-yyyy'
            ])
            ->add('observaciones', TextareaType::class, [
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Alumno::class
        ]);
    }
}