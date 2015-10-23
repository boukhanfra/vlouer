<?php

namespace GsmLot\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * DeviceModel
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class DeviceModel
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
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="spec", type="string", length=255)
     */
    private $spec;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="DeviceType", inversedBy="devices")
     * @ORM\JoinColumn(name="deviceTypeId", referencedColumnName="id")
     */
    protected $deviceType;

    /**
     * @ORM\OneToMany(targetEntity="Offer", mappedBy="DeviceModel")
     */
    protected $offers;
    
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
     * @return DeviceModel
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
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
     * @param string $model
     *
     * @return DeviceModel
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set spec
     *
     * @param string $spec
     *
     * @return DeviceModel
     */
    public function setSpec($spec)
    {
        $this->spec = $spec;

        return $this;
    }

    /**
     * Get spec
     *
     * @return string
     */
    public function getSpec()
    {
        return $this->spec;
    }

    /**
     * Set deviceType
     *
     * @param \AppBundle\Entity\DeviceType $deviceType
     *
     * @return DeviceModel
     */
    public function setDeviceType(\AppBundle\Entity\DeviceType $deviceType = null)
    {
        $this->deviceType = $deviceType;

        return $this;
    }

    /**
     * Get deviceType
     *
     * @return \AppBundle\Entity\DeviceType
     */
    public function getDeviceType()
    {
        return $this->deviceType;
    }

    /**
     * Add offer
     *
     * @param \AppBundle\Entity\Offer $offer
     *
     * @return DeviceModel
     */
    public function addOffer(\AppBundle\Entity\Offer $offer)
    {
        $this->offers[] = $offer;

        return $this;
    }

    /**
     * Remove offer
     *
     * @param \AppBundle\Entity\Offer $offer
     */
    public function removeOffer(\AppBundle\Entity\Offer $offer)
    {
        $this->offers->removeElement($offer);
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
