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
                ->add('offer','text',array('data_class'=>'GsmLot\OfferBundle\Entity\Offer','read_only'=>true))
                ->add('senderTrader','text',
                    array('data_class'=>'GsmLot\TraderBundle\Entity\Trader','read_only'=>true))
                ->add('receiverTrader','text',array('required'=>false,'read_only'=>true,
                    'data_class'=>'GsmLot\TraderBundle\Entity\Trader'));
    }

    public function getName()
    {
       return 'message';
    }

}