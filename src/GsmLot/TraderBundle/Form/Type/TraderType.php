<?php

namespace GsmLot\TraderBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TraderType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('company')
            ->add('email')
            ->add('adress')
            ->add('mobileNumber')
            ->add('fixedNumber')
            ->add('faxNumber')
            ->add('user')
		    ->add('JobTitle','entity',array('class'=>'GsmLot\TraderBundle\Entity\Jobtitle'))
		    
		    
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GsmLot\TraderBundle\Entity\Trader'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gsmlot_traderbundle_trader';
    }
}
