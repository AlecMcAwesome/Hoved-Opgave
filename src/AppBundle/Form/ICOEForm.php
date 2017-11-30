<?php
/**
 * Created by PhpStorm.
 * User: FrederikPetersen
 * Date: 27/11/2017
 * Time: 14.15
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class ICOEForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contactPerson', TextType::class, array('label' => false,'required' => false))
            ->add('cpTelefon', IntegerType::class, array('label' => false,'required' => false))
            ->add('cpEmail', EmailType::class, array('label' => false,'required' => false))

            ->add('hospitalName', TextType::class, array('label' => false,'required' => false))
            ->add('hospitalAddress', TextType::class, array('label' => false,'required' => false))
            ->add('hospitalTlf', IntegerType::class, array('label' => false,'required' => false))
            ->add('submit', SubmitType::class)
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

}