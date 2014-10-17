<?php

namespace campusys\PedagogieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SemestreType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', 'text')
            ->add('dateDebut', 'date', array('widget'=>'single_text','format'=>'dd/MM/yyyy'))
            ->add('dateFin', 'date', array('widget'=>'single_text','format'=>'dd/MM/yyyy'))
            ->add('active', 'checkbox', array('required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'campusys\PedagogieBundle\Entity\Semestre'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'campusys_pedagogiebundle_semestre';
    }
}
