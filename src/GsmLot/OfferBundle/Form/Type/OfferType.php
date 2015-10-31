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
				->add('brand','entity',array('class'=>'GsmLot\OfferBundle\Entity\Brand'))
				->add('device','entity',array('class'=>'GsmLot\OfferBundle\Entity\Device'))
				->add('model','entity',array('class'=>'GsmLot\OfferBundle\Entity\Model'))
				->add('deviceType','entity',array('class'=>'GsmLot\OfferBundle\Entity\DeviceType'))
				->add('norm','entity',array('class'=>'GsmLot\OfferBundle\Entity\Norm'))
				->add('qte','number')
				->add('price','money')
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