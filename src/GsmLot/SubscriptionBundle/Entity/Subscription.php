<?php

namespace GsmLot\SubscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GsmLot\TraderBundle\Entity\Trader;

/**
 * Subscription
 *
 * @ORM\Table(name="subscription")
 * @ORM\Entity
 */
class Subscription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="subscriptionDate", type="datetime")
     */
    private $subscriptionDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="period", type="integer")
     */
    private $period;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="paimentReference", type="string", length=255)
     */
    private $paimentReference;

    /**
     * @var string
     *
     * @ORM\Column(name="cardHolder", type="string", length=255)
     */
    private $cardHolder;

    /**
     * @var string
     *
     * @ORM\Column(name="CardNumber", type="string", length=255)
     */
    private $cardNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="paiementDate", type="datetime")
     */
    private $paiementDate;

    
    /**
     * @ORM\ManyToOne(targetEntity="Trader", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="traderId", referencedColumnName="id")
     */
    protected $trader;

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
     * Set subscriptionDate
     *
     * @param \DateTime $subscriptionDate
     *
     * @return Subscription
     */
    public function setSubscriptionDate($subscriptionDate)
    {
        $this->subscriptionDate = $subscriptionDate;

        return $this;
    }

    /**
     * Get subscriptionDate
     *
     * @return \DateTime
     */
    public function getSubscriptionDate()
    {
        return $this->subscriptionDate;
    }

    /**
     * Set period
     *
     * @param integer $period
     *
     * @return Subscription
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return integer
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Subscription
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set paimentReference
     *
     * @param string $paimentReference
     *
     * @return Subscription
     */
    public function setPaimentReference($paimentReference)
    {
        $this->paimentReference = $paimentReference;

        return $this;
    }

    /**
     * Get paimentReference
     *
     * @return string
     */
    public function getPaimentReference()
    {
        return $this->paimentReference;
    }

    /**
     * Set cardHolder
     *
     * @param string $cardHolder
     *
     * @return Subscription
     */
    public function setCardHolder($cardHolder)
    {
        $this->cardHolder = $cardHolder;

        return $this;
    }

    /**
     * Get cardHolder
     *
     * @return string
     */
    public function getCardHolder()
    {
        return $this->cardHolder;
    }

    /**
     * Set cardNumber
     *
     * @param string $cardNumber
     *
     * @return Subscription
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * Get cardNumber
     *
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Set paiementDate
     *
     * @param \DateTime $paiementDate
     *
     * @return Subscription
     */
    public function setPaiementDate($paiementDate)
    {
        $this->paiementDate = $paiementDate;

        return $this;
    }

    /**
     * Get paiementDate
     *
     * @return \DateTime
     */
    public function getPaiementDate()
    {
        return $this->paiementDate;
    }

    /**
     * Set trader
     *
     * @param \AppBundle\Entity\Trader $trader
     *
     * @return Subscription
     */
    public function setTrader(Trader $trader = null)
    {
        $this->trader = $trader;

        return $this;
    }

    /**
     * Get trader
     *
     * @return \AppBundle\Entity\Trader
     */
    public function getTrader()
    {
        return $this->trader;
    }
}
