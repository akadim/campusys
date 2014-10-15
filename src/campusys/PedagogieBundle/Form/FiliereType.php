<?php

namespace campusys\PedagogieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FiliereType extends AbstractType
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
            ->add('active', 'checkbox', array('required' => false))
            ->add('campus', 'entity', array(
                      'class' => 'campusysPedagogieBundle:Campus',
                      'property' => 'name',
                      'empty_value' => 'choisissez un campus'
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'campusys\PedagogieBundle\Entity\Filiere'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'campusys_pedagogiebundle_filiere';
    }
}
