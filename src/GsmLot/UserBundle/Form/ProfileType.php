<?php
namespace GsmLot\UserBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use GsmLot\TraderBundle\Form\Type\TraderType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ProfileType extends AbstractType
{
	
	private $user;
	
	
	public function __construct($context)
	{
		$this->user = $context->getToken()->getUser();
	}
	
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('trader', new TraderType($this->user->getTrader()->getCity()->getCountry()->getId())) ; 
		
	}

	public function getParent()
	{
		return 'fos_user_profile';
	}

	public function getName()
	{
		return 'trader_user_profile';
	}
}
?>