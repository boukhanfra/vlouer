<?php

namespace GsmLot\OfferBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GsmLot\TraderBundle\Entity\Trader;

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
     * @var decimal
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
     * @ORM\Column(name="disabled", type="boolean",nullable=false)
     */
    private $disabled;

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
     * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\Brand")
     * @ORM\JoinColumn(name="brand_id",referencedColumnName="brand_id",nullable=false)
     */
    protected $brand;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\OfferType")
     * @ORM\JoinColumn(name="offer_type_id",referencedColumnName="offer_type_id",nullable=false)
     */
    protected  $offerType;
    
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
     * Is disabled
     *
     * @return boolean
     */
    public function isDisabled()
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
     * 
     * @return DateTime
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
     * Get disabled
     *
     * @return bool
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * Set norm
     *
     * @param \GsmLot\OfferBundle\Entity\Norm $norm
     *
     * @return Offer
     */
    public function setNorm(\GsmLot\OfferBundle\Entity\Norm $norm = null)
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
    public function setDeviceType(\GsmLot\OfferBundle\Entity\DeviceType $deviceType = null)
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
    public function setModel(\GsmLot\OfferBundle\Entity\Model $model = null)
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
     * Constructor
     */
    public function __construct()
    {
        $this->brand = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add brand
     *
     * @param \GsmLot\OfferBundle\Entity\Brand $brand
     *
     * @return Offer
     */
    public function addBrand(\GsmLot\OfferBundle\Entity\Brand $brand)
    {
        $this->brand[] = $brand;

        return $this;
    }

    /**
     * Remove brand
     *
     * @param \GsmLot\OfferBundle\Entity\Brand $brand
     */
    public function removeBrand(\GsmLot\OfferBundle\Entity\Brand $brand)
    {
        $this->brand->removeElement($brand);
    }

    /**
     * Get brand
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set brand
     *
     * @param \GsmLot\OfferBundle\Entity\Brand $brand
     *
     * @return Offer
     */
    public function setBrand(\GsmLot\OfferBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Set offerType
     *
     * @param \GsmLot\OfferBundle\Entity\OfferType $offerType
     *
     * @return Offer
     */
    public function setOfferType(\GsmLot\OfferBundle\Entity\OfferType $offerType = null)
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
}
