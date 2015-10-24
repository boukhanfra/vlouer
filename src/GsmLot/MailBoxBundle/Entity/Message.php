<?php

namespace GsmLot\MailBox\Entity;

use Doctrine\ORM\Mapping as ORM;
use GsmLot\TraderBundle\Entity\Trader;

/**
 * Mailbox
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="GsmLot\MailBoxBundle\Repository\MessageRepository")
 */
class Message
{
    /**
     * @var integer
     *
     * @ORM\Column(name="message_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * 
     * @var string
     * 
     * @ORM\Column(name="subject",type="string",length=255)
     */
    private $subject;
    
    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="message_on", type="datetime")
     */
    private $messageOn;
    
    
    /**
     * 
     * @var boolean
     * 
     * @ORM\Column(name="readed",type="boolean")
     */
    private $readed;

    /**
     * @ORM\ManyToOne(targetEntity="Trader")
     * @ORM\JoinColumn(name="receiver_trader_id", referencedColumnName="trader_id")
     */
    protected $receiverTrader;
    
    /**
     * @ORM\ManyToOne(targetEntity="Trader")
     * @ORM\JoinColumn(name="sender_trader_id", referencedColumnName="trader_id")
     */
    protected $senderTrader;
    
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get body
     * 
     * @return string
     */
    public function getBody()
    {
    	return $this->body;
    }
    
    
    /**
     * Set body
     * @param string $body
     */
    public function setBody($body)
    {
    	$this->body = $body;
    }
    
    
    /**
     * Set subject
     *
     * @param string $subject
     *
     */
    public function setMessage($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set dateMessage
     *
     * @param \DateTime $dateMessage
     *
     * @return Mailbox
     */
    public function setDateMessage($dateMessage)
    {
        $this->dateMessage = $dateMessage;

        return $this;
    }

    /**
     * Get dateMessage
     *
     * @return \DateTime
     */
    public function getDateMessage()
    {
        return $this->dateMessage;
    }

    /**
     * Set receiverTrader
     *
     * @param Trader $receiverTrader
     *
     */
    public function setReciverTrader(Trader $receiverTrader = null)
    {
        $this->receiverTrader = $receiverTrader;
    }

    /**
     * Get receiverTrader
     *
     * @return Trader
     */
    public function getReceiverTrader()
    {
        return $this->receiverTrader;
    }

    /**
     * Set sender
     *
     * @param Trader $senderTrader
     *
     */
    public function setSender(Trader $senderTrader = null)
    {
        $this->senderTrader = $senderTrader;

    }

    /**
     * Get senderTrader
     *
     * @return Trader
     */
    public function getSenderTrader()
    {
        return $this->senderTrader;
    }
    
    
    /**
     * Get readed
     * @return boolean
     */
    public function isReaded()
    {
    	return $this->readed;
    }
    
}
