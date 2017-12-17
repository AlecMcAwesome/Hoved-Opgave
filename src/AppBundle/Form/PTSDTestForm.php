<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PTSDTestForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question1', ChoiceType::class, array(
                'choices' => array(
                    'Ja, meget!' => 5,
                    'sjældent ' => 3,
                    'nej, aldrig ' => 2
                ), 'choices_as_values' => true, 'multiple' => false, 'expanded' => true, 'label' => 'Har du ofte påtrængende tanker eller billeder (flashbacks) af den traumatiske oplevelse?'))
            ->add('question2', ChoiceType::class, array(
                'choices' => array(
                    'Ja, meget!' => 5,
                    'sjældent ' => 3,
                    'nej, aldrig ' => 2
                ), 'choices_as_values' => true, 'multiple' => false, 'expanded' => true, 'label' => 'Har du tilbagevendende mareridt eller ubehagelige drømme om oplevelsen?'))
            ->add('question3', ChoiceType::class, array(
                'choices' => array(
                    'Ja, meget!' => 5,
                    'sjældent' => 3,
                    'nej, aldrig' => 2
                ), 'choices_as_values' => true, 'multiple' => false, 'expanded' => true, 'label' => 'Føler du en intens angst, når noget minder dig om den traumatiske oplevelse? Uanset om det er noget, du tænker på eller noget du ser?'))
            ->add('question4', ChoiceType::class, array(
                'choices' => array(
                    'Ja, meget!' => 5,
                    'sjældent ' => 3,
                    'nej, aldrig ' => 2
                ), 'choices_as_values' => true, 'multiple' => false, 'expanded' => true, 'label' => 'Har du ubehag ved at huske vigtige detaljer fra den voldsomme oplevelse?'))
            ->add('submit', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'app_bundle_ptsdtest_form';
    }
}
