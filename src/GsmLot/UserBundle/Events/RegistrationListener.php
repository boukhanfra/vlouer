<?php


namespace GsmLot\UserBundle\Events;


use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class RegistrationListener implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return array(FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistration');
    }

    public function onRegistration(FormEvent $event)
    {

        echo $event->getUser()->getUsername();
        exit();
    }
}