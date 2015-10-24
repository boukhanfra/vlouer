<?php

namespace GsmLot\OfferBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * DeviceModel
 *
 * @ORM\Table(name="device")
 * @ORM\Entity
 */
class Device
{
    /**
     * @var integer
     *
     * @ORM\Column(name="device_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\Brand")
     * @ORM\JoinColumn(name="brand_id",referencedColumnName="brand_id")
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\Model")
     * @ORM\JoinColumn(name="model_id",referencedColumnName="model_id")
     */
    protected $model;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\DeviceType")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="type_id")
     */
    protected $type;
    
    
    /**
     * @ORM\OneToMany(targetEntity="GsmLot\OfferBundle\Entity\Offer", mappedBy="device")
     */
    protected $offers;

    /**
     * 
     */
    public function __construct()
    {
    	$this->offers = new ArrayCollection();
    }
    
    
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
     * Set brand
     *
     * @param string $brand
     *
     * @return Device
     */
    public function setBrand(Device $brand)
    {
        $this->brand = $brand;

    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set model
     *
     * @param Model $model
     *
     */
    public function setModel(Model $model)
    {
        $this->model = $model;

    }

    /**
     * Get model
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }
    
    
    /**
     * Get type
     *
     * @return DeviceType
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * 
     * @param DeviceType $type
     */
    public function setType(DeviceType $type)
    {
    	$this->type = $type;
    }


    /**
     * Get offers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOffers()
    {
        return $this->offers;
    }
}
