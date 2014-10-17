<?php

namespace campusys\PedagogieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ModuleType extends AbstractType
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
            ->add('semestre', 'entity', array(
                     'class' => 'campusysPedagogieBundle:Semestre',
                     'property' => 'name',
                     'empty_value' => 'Choisissez un semestre'
            ))  
            ->add('filiere', 'entity', array(
                     'class' => 'campusysPedagogieBundle:Filiere',
                     'property' => 'name',
                     'empty_value' => 'Choisissez une filière'
            ))   
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'campusys\PedagogieBundle\Entity\Module'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'campusys_pedagogiebundle_module';
    }
}
