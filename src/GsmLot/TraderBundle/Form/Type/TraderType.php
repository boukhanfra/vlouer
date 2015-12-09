<?php

namespace GsmLot\TraderBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use GsmLot\TraderBundle\Entity\Country;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormInterface;

class TraderType extends AbstractType
{
	
	private $countryId;
	
	
	
	public function __construct($countryId)
	{
		$this->countryId = $countryId;
	}
	
	
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
            ->add('fixedNumber','text',array('required'=>false))
            ->add('faxNumber','text',array('required'=>false))
		    ->add('jobTitle','entity',array('class'=>'GsmLot\TraderBundle\Entity\JobTitle'))
		    ->add('country','entity',array('class'=>'GsmLot\TraderBundle\Entity\Country'))
			->add('city','entity',array('class'=>'GsmLot\TraderBundle\Entity\City'));

		 
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
