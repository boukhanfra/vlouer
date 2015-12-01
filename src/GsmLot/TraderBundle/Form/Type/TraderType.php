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
            ->add('fixedNumber','text')
            ->add('faxNumber','text')
		    ->add('jobTitle','entity',array('class'=>'GsmLot\TraderBundle\Entity\JobTitle'))
		    ->add('country','entity',array('class'=>'GsmLot\TraderBundle\Entity\Country')) ;
        
		    $countryId=$this->countryId;
		    
		    if(is_null($countryId))
		    {
		    $builder->add('city','entity',array('class'=>'GsmLot\TraderBundle\Entity\City')) ;
		    	
		    
		    }
		    
		    else {
		    $formUpdate  = function(FormInterface $form) use ( $countryId ) 
		    {
		    	

		    	$options =array(
		    			'class' => 'GsmLot\TraderBundle\Entity\City',
		    			'query_builder' => function(EntityRepository $er ) use ( $countryId ) {
		    			return  $er->createQueryBuilder('w')
		    			->orderBy('w.name', 'ASC')
		    			->where('w.country = :country_id')
		    			->setParameter('country_id', $countryId);
		    			});
		    	
		    	$form->add('city','entity',$options);
		    	
		    };
		    
		 $builder->addEventListener(FormEvents::PRE_SET_DATA,function(FormEvent $event)use($formUpdate)
		 {
				$formUpdate($event->getForm());
		 });    
		 
		    }
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
