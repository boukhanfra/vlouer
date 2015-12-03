<?php

namespace GsmLot\OfferBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GsmLot\TraderBundle\Entity\Trader;

/**
 * Offer
 *
 * @ORM\Table(name="offer")
 * @ORM\Entity(repositoryClass="GsmLot\OfferBundle\Repository\OfferRepository")
 */
class Offer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="offer_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_on", type="datetime",nullable=false)
     */
    private $createdOn;
    
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_on", type="datetime",nullable=true)
     */
    private $updatedOn;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean",nullable=false)
     */
    private $active;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", length=15,nullable=false)
     */
    private $quantity;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="decimal",precision=16,scale=2,nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text",nullable=false)
     */
    private $description;

    /**
     * 
     * @ORM\Column(name="currency",type="string",length=10,nullable=false)
     */
    private $currency;
    
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="physical_stock", type="boolean",nullable=true)
     */
    private $physicalStock;


    /**
     * @var boolean
     *
     * @ORM\Column(name="enable", type="boolean",nullable=false)
     */
    private $enable;

    /**
     * @ORM\ManyToOne(targetEntity="GsmLot\TraderBundle\Entity\Trader", inversedBy="offers")
     * @ORM\JoinColumn(name="trader_id", referencedColumnName="trader_id",nullable=true)
     */
    protected $trader;
    
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\Norm")
     * @ORM\JoinColumn(name="norm_id",referencedColumnName="norm_id",nullable=false)
     */
    protected $norm;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\DeviceType")
     * @ORM\JoinColumn(name="type_id",referencedColumnName="type_id",nullable=false)
     */
    protected $deviceType;
	
    /**
     * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\Model")
     * @ORM\JoinColumn(name="model_id",referencedColumnName="model_id",nullable=false)
     */
    protected $model;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\OfferType")
     * @ORM\JoinColumn(name="offer_type_id",referencedColumnName="offer_type_id",nullable=false)
     */
    protected  $offerType;
    
    /**
     * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\OfferState")
     * @ORM\JoinColumn(name="offer_state_id",referencedColumnName="offer_state_id",nullable=false)
     */
    protected $offerState;
    
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
     * Set createdOn
     *
     * @param \DateTime $createdOn
     *
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;

    }

    /**
     * Get createdOn
     *
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * 
     * @param bool $active
     */
    public function setActive($active)
    {
    	$this->active = $active;
    }

    /**
     * Is active
     *
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
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
     * Set physicalStock
     *
     * @param boolean $physicalStock
     *
     * @return Offer
     */
    public function setPhysicalStock($physicalStock)
    {
        $this->physicalStock = $physicalStock;

        return $this;
    }

    /**
     * Get physicalStock
     *
     * @return boolean
     */
    public function getPhysicalStock()
    {
        return $this->physicalStock;
    }

    /**
     * Set enable
     *
     * @param boolean $enable
     *
     * @return Offer
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;

        return $this;
    }

    /**
     * Is enabled
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enable;
    }
    
    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnable()
    {
    	return $this->enable;
    }


    /**
     * Set trader
     *
     * @param Trader $trader
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
     * @return Trader
     */
    public function getTrader()
    {
        return $this->trader;
    }

    /**
     * 
     * @return \DateTime
     */
    public function getUpdatedOn()
    {
    	return $this->updatedOn;
    }
    
    /**
     * 
     * @param mixed $updatedOn
     */
    public function setUpdateOn($updatedOn)
    {
    	$this->updatedOn = $updatedOn;
    }
    

    /**
     * Set updatedOn
     *
     * @param \DateTime $updatedOn
     *
     * @return Offer
     */
    public function setUpdatedOn($updatedOn)
    {
        $this->updatedOn = $updatedOn;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }


    /**
     * Set norm
     *
     * @param \GsmLot\OfferBundle\Entity\Norm $norm
     *
     * @return Offer
     */
    public function setNorm(Norm $norm = null)
    {
        $this->norm = $norm;

        return $this;
    }

    /**
     * Get norm
     *
     * @return \GsmLot\OfferBundle\Entity\Norm
     */
    public function getNorm()
    {
        return $this->norm;
    }

    /**
     * Set deviceType
     *
     * @param \GsmLot\OfferBundle\Entity\DeviceType $deviceType
     *
     * @return Offer
     */
    public function setDeviceType(DeviceType $deviceType = null)
    {
        $this->deviceType = $deviceType;

        return $this;
    }

    /**
     * Get deviceType
     *
     * @return \GsmLot\OfferBundle\Entity\DeviceType
     */
    public function getDeviceType()
    {
        return $this->deviceType;
    }

    /**
     * Set model
     *
     * @param \GsmLot\OfferBundle\Entity\Model $model
     *
     * @return Offer
     */
    public function setModel(Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \GsmLot\OfferBundle\Entity\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set offerType
     *
     * @param \GsmLot\OfferBundle\Entity\OfferType $offerType
     *
     * @return Offer
     */
    public function setOfferType(OfferType $offerType = null)
    {
        $this->offerType = $offerType;

        return $this;
    }

    /**
     * Get offerType
     *
     * @return \GsmLot\OfferBundle\Entity\OfferType
     */
    public function getOfferType()
    {
        return $this->offerType;
    }

    /**
     * Set quantity
     *
     * @param string $quantity
     *
     * @return Offer
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Offer
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
    
    /**
     * @return OfferState
     */
    public function getOfferState()
    {
    	return $this->offerState;
    }
    
    /**
     * 
     * @param OfferState $offerState
     */
    public function setOfferState($offerState)
    {
    	$this->offerState = $offerState;
    }
}
