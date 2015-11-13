<?php

namespace GsmLot\UserBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use GsmLot\TraderBundle\Form\Type\TraderType;
use GsmLot\TraderBundle\Entity\Trader;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	$builder->add('trader', new TraderType()) ; // Rajoutez cette ligne
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'trader_user_registration';
    }
}