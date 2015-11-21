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
            ->add('firstName','text')
            ->add('lastName','text')
            ->add('company','text')
            ->add('email','email')
            ->add('address','text')
            ->add('mobileNumber','text')
            ->add('fixedNumber','text')
            ->add('faxNumber','text')
		    ->add('jobTitle','entity',array('class'=>'GsmLot\TraderBundle\Entity\JobTitle'))
		    ->add('country','entity',array('class'=>'GsmLot\TraderBundle\Entity\Country'))
		    ->add('city','entity',array('class'=>'GsmLot\TraderBundle\Entity\City'))
		       
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
