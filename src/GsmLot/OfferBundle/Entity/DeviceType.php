<?php

namespace GsmLot\OfferBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * DeviceType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class DeviceType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="type_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;



    /**
     * @ORM\OneToMany(targetEntity="GsmLot\OfferBundle\Entity\Device", mappedBy="type")
     */
    protected $devices;
    
    public function __construct()
    {
    	$this->devices = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

   
    /**
     * Get devices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDevices()
    {
        return $this->devices;
    }

    /**
     * Add device
     *
     * @param \GsmLot\OfferBundle\Entity\Device $device
     *
     * @return DeviceType
     */
    public function addDevice(\GsmLot\OfferBundle\Entity\Device $device)
    {
        $this->devices[] = $device;

        return $this;
    }

    /**
     * Remove device
     *
     * @param \GsmLot\OfferBundle\Entity\Device $device
     */
    public function removeDevice(\GsmLot\OfferBundle\Entity\Device $device)
    {
        $this->devices->removeElement($device);
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
    	return $this->name;
    }
}
