<?php

namespace GsmLot\OfferBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class OfferType extends AbstractType
{
	/**
	 * 
	 * {@inheritDoc}
	 * @see \Symfony\Component\Form\AbstractType::buildForm()
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('offerType','entity',array('class'=>'GsmLot\OfferBundle\Entity\OfferType'))
				->add('model','autocomplete',array('class'=>'GsmLotOfferBundle:Model'))
				->add('norm','entity',array('class'=>'GsmLot\OfferBundle\Entity\Norm'))
				->add('currency','choice',array('choices'=>array('EUR'=>'EUR','USD'=>'USD','GBP'=>'GBP')))
				->add('quantity','number')
				->add('price','number')
				->add('physicalStock','checkbox')
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
}