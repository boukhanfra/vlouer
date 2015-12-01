<?php

namespace GsmLot\OfferBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OfferType extends AbstractType
{
	/**
	 * 
	 * {@inheritDoc}
	 * @see \Symfony\Component\Form\AbstractType::buildForm()
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('offerType','entity',array('class'=>'GsmLot\OfferBundle\Entity\OfferType',
												 'multiple'=>false,
												 'expanded'=>true,
												 'label' => false,
												 'data_class'=> 'GsmLot\OfferBundle\Entity\OfferType'
		))
				->add('offerState','entity',array('class'=>'GsmLot\OfferBundle\Entity\OfferState',
													'multiple'=>false,
													'expanded'=>true,
													'data_class'=> 'GsmLot\OfferBundle\Entity\OfferState'
				))
				->add('model','autocomplete',array('class'=>'GsmLotOfferBundle:Model','required'=>false))
				->add('norm','entity',array('class'=>'GsmLot\OfferBundle\Entity\Norm'))
				->add('currency','choice',array('choices'=>array('EUR'=>'EUR','USD'=>'USD','GBP'=>'GBP')))
				->add('quantity','number')
				->add('price','number')
				->add('physicalStock','checkbox',array('required'=>false))
				->add('description','textarea');
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \Symfony\Component\Form\FormTypeInterface::getName()
	 */
	public function getName()
	{
		return 'new_offer';
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \Symfony\Component\Form\AbstractType::setDefaultOptions()
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'GsmLot\OfferBundle\Entity\Offer'
		));
	}
}