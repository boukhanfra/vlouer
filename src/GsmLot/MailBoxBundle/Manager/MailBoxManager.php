<?php

namespace GsmLot\MailBoxBundle\Manager;

use Doctrine\ORM\EntityManager;
use GsmLot\IndexBundle\Entity\Manager;
use GsmLot\MailBoxBundle\Entity\Message;
use GsmLot\UserBundle\Entity\User;
use GsmLot\TraderBundle\Entity\Trader;

/**
 * Class MailBoxManager
 * @package GsmLot\MailBoxBundle\Manager
 * @author aziz
 */
class MailBoxManager extends Manager
{
    /**
     * @var User
     */
    private $currentUser;

    /**
     * MailBoxManager constructor.
     * @param EntityManager $em
     * @param $currentUser
     */
    public function __construct(EntityManager $em,$currentUser)
    {
        $this->currentUser = $currentUser;
        parent::__construct($em);
    }

    /**
     * @return \GsmLot\MailBoxBundle\Repository\MessageRepository
     */
    private function getRepository()
    {
        return $this->em->getRepository('GsmLotMailBoxBundle:Message');
    }

    /**
     * @param Message $message
     * @throws \Exception
     */
    public function createMessage(Message $message)
    {
        try
        {
            $message->setReaded(false);
            $message->setSender($this->currentUser->getTrader());
            $this->persistAndFlush($message);
        }
        catch(\Exception $e)
        {
            throw $e;
        }
    }

    /**
     * @param Message $message
     * @throws \Exception
     */
    public function readMessage(Message $message)
    {
        try
        {
            $message->setReaded(true);

            $this->persistAndFlush($message);
        }
        catch(\Exception $e)
        {
            throw $e;
        }
    }

    /**
     * @param $id
     * @return Message
     */
    public function getMessage($id)
    {
       return  $this->getRepository()->find($id);
    }

    /**
     * @param Trader $trader
     * @return array
     * @throws \Exception
     */
    public function getMailBox(Trader $trader)
    {
        try
        {
            return $this->getRepository()->getMailBox($trader);
        }
        catch(\Exception $e)
        {
            throw $e;
        }
    }

    /**
     * @param Message $message
     * @throws \Exception
     */
    public function removeMessage(Message $message)
    {
        try
        {
            $this->persistAndFlush($message);
        }
        catch(\Exception $e)
        {
            throw $e;
        }
    }

}