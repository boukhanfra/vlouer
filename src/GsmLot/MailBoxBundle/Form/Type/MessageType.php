<?php

namespace GsmLot\MailBoxBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MessageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('subject','text',array('required'=>true))
                ->add('body','textarea',array('required'=>true))
                ->add('offer','entity',array('class'=>'GsmLotOffreBundle:Offer'))
                ->add('traderSender','entity',array('class'=>'GsmLotTraderBundle:Trader'));
    }

    public function getName()
    {
       return 'message';
    }

}