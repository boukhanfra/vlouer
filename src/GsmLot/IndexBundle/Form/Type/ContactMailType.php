<?php

namespace GsmLot\IndexBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactMailType extends AbstractType
{
	/**
	 * 
	 * {@inheritDoc}
	 * @see \Symfony\Component\Form\AbstractType::buildForm()
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('firstName','text')
				->add('lastName','text')
				->add('email','email')
				->add('objectMail','text')
				->add('messageMail','textarea', array('attr' => array('class' => 'form-control')))
				
		;
	}
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see \Symfony\Component\Form\FormTypeInterface::getName()
	 */
	public function getName()
	{
		return 'new_contact';
	}
}