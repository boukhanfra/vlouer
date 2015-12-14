<?php

namespace GsmLot\MailBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GsmLot\TraderBundle\Entity\Trader;
use GsmLot\OfferBundle\Entity\Offer;

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
     * @var string
     * @ORM\Column(name="ip",type="string",length=255)
     */
    private $ip;


    /**
     * 
     * @var boolean
     * 
     * @ORM\Column(name="readed",type="boolean")
     */
    private $readed;

    /**
     * @ORM\ManyToOne(targetEntity="GsmLot\TraderBundle\Entity\Trader",inversedBy="messagesReceived")
     * @ORM\JoinColumn(name="receiver_trader_id", referencedColumnName="trader_id")
     */
    protected $receiverTrader;
    
    /**
     * @ORM\ManyToOne(targetEntity="GsmLot\TraderBundle\Entity\Trader",inversedBy="messagesSent")
     * @ORM\JoinColumn(name="sender_trader_id", referencedColumnName="trader_id")
     */
    protected $senderTrader;

    /**
     * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\Offer")
     * @ORM\JoinColumn(name="offer_id",referencedColumnName="offer_id")
     * @var Offer
     */
    protected $offer;
    
    
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
     * @return \DateTime
     */
    public function getMessageOn()
    {
        return $this->messageOn;
    }

    /**
     * @param \DateTime $messageOn
     */
    public function setMessageOn($messageOn)
    {
        $this->messageOn = $messageOn;
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
    public function setSenderTrader(Trader $senderTrader = null)
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

    /**
     * @param boolean $readed
     */
    public function setReaded($readed)
    {
        $this->readed = $readed;
    }

    /**
     * @return Offer
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * @param Offer $offer
     */
    public function setOffer(Offer $offer)
    {
        $this->offer = $offer;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

}
