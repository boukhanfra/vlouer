<?php

namespace GsmLot\OfferBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GsmLot\TraderBundle\Entity\Trader;
use GsmLot\TraderBundle\Entity\Country;

/**
 * Offer
 *
 * @ORM\Table(name="offer")
 * @ORM\Entity
 */
class Offer
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
     * @var string
     *
     * @ORM\Column(name="typeOffer", type="string", length=255)
     */
    private $typeOffer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_on", type="datetime")
     */
    private $createdOn;
    
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_on", type="datetime")
     */
    private $updatedOn;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="qte", type="string", length=255)
     */
    private $qte;

    /**
     * @var decimal
     *
     * @ORM\Column(name="price", type="decimal",precision=16,scale=2)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="phisical_stock", type="boolean")
     */
    private $phisicalStock;

    /**
     * @var boolean
     *
     * @ORM\Column(name="used", type="boolean")
     */
    private $used;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disabled", type="boolean")
     */
    private $disabled;

    /**
     * @ORM\ManyToOne(targetEntity="GsmLot\TraderBundle\Entity\Trader", inversedBy="offers")
     * @ORM\JoinColumn(name="trader_id", referencedColumnName="trader_id")
     */
    protected $trader;
    
    /**
     * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\Device", inversedBy="offers")
     * @ORM\JoinColumn(name="device_id", referencedColumnName="device_id")
     */
    protected $device;
    
    
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
     * Set typeOffer
     *
     * @param string $typeOffer
     *
     * @return Offer
     */
    public function setTypeOffer($typeOffer)
    {
        $this->typeOffer = $typeOffer;

        return $this;
    }

    /**
     * Get typeOffer
     *
     * @return string
     */
    public function getTypeOffer()
    {
        return $this->typeOffer;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Offer
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Offer
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
     * Set qte
     *
     * @param string $qte
     *
     * @return Offer
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return string
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Offer
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Offer
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set phisicalStock
     *
     * @param boolean $phisicalStock
     *
     * @return Offer
     */
    public function setPhisicalStock($phisicalStock)
    {
        $this->phisicalStock = $phisicalStock;

        return $this;
    }

    /**
     * Get phisicalStock
     *
     * @return boolean
     */
    public function getPhisicalStock()
    {
        return $this->phisicalStock;
    }

    /**
     * Set used
     *
     * @param boolean $used
     *
     * @return Offer
     */
    public function setUsed($used)
    {
        $this->used = $used;

        return $this;
    }

    /**
     * Get used
     *
     * @return boolean
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * Set disabled
     *
     * @param boolean $disabled
     *
     * @return Offer
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * Get disabled
     *
     * @return boolean
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * Set modificationDate
     *
     * @param \DateTime $modificationDate
     *
     * @return Offer
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }

    /**
     * Get modificationDate
     *
     * @return \DateTime
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * Set trader
     *
     * @param \AppBundle\Entity\Trader $trader
     *
     * @return Offer
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

    /**
     * Set country
     *
     * @param \AppBundle\Entity\DeviceModel $country
     *
     * @return Offer
     */
    public function setCountry(Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\DeviceModel
     */
    public function getCountry()
    {
        return $this->country;
    }
}
