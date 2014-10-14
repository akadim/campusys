<?php

namespace campusys\PedagogieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CampusType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('address', 'text')
            ->add('slogan', 'text')
            ->add('file')
            ->add('description', 'textarea')
            ->add('created', 'date', array('widget'=>'single_text','format'=>'dd/MM/yyyy'))
            ->add('deanName', 'text')
            ->add('university', 'entity', array(
                           'class' => 'campusysPedagogieBundle:University',
                           'property' => 'name',
                           'empty_value' => 'Choisissez une université'
            ))
            ->add('active', 'checkbox', array('required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'campusys\PedagogieBundle\Entity\Campus'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'campusys_pedagogiebundle_campus';
    }
}
