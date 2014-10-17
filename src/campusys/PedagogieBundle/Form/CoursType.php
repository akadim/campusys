<?php

namespace campusys\PedagogieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CoursType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('description', 'textarea')
            ->add('numberOfHour', 'text')
            ->add('active', 'checkbox', array('required' => false))
            ->add('module', 'entity', array(
                            'class'=> 'campusysPedagogieBundle:Module',
                            'property' => 'name',
                            'empty_value' => 'Choisissez un module'
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'campusys\PedagogieBundle\Entity\Cours'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'campusys_pedagogiebundle_cours';
    }
}
