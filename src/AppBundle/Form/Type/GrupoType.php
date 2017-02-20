<?php

namespace AppBundle\Form\Type;


use AppBundle\Entity\Grupo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GrupoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion', TextType::class, [
                'label' => 'Descripción del aula'
            ])
            ->add('aula', TextType::class)
            ->add('planta', IntegerType::class)
            ->add('tutor', null, [
                    'placeholder' => 'No hay ninguno asignado',
                    'expanded' => false
                ]);
//            ->add('enviar', SubmitType::class, [
//                'label' => 'Guardar los cambios',
//                'attr' => [
//                    'class' => 'btn btn-success'
//                ]
//            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Grupo::class
        ]);
    }
}