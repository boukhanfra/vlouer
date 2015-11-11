<?php
namespace GsmLot\UserBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use GsmLot\TraderBundle\Form\Type\TraderType;

class ProfileType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('trader', new TraderType()) ; 
		
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