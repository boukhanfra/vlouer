<?php

namespace GsmLot\ProductBundle\Entity;

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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="screenSize", type="float")
     */
    private $screenSize;


    /**
     * @ORM\OneToMany(targetEntity="DeviceModel", mappedBy="DeviceType")
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
     * Set type
     *
     * @param string $type
     *
     * @return DeviceType
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set screenSize
     *
     * @param float $screenSize
     *
     * @return DeviceType
     */
    public function setScreenSize($screenSize)
    {
        $this->screenSize = $screenSize;

        return $this;
    }

    /**
     * Get screenSize
     *
     * @return float
     */
    public function getScreenSize()
    {
        return $this->screenSize;
    }

    /**
     * Add device
     *
     * @param \AppBundle\Entity\DeviceModel $device
     *
     * @return DeviceType
     */
    public function addDevice(DeviceModel $device)
    {
        $this->devices[] = $device;

        return $this;
    }

    /**
     * Remove device
     *
     * @param \AppBundle\Entity\DeviceModel $device
     */
    public function removeDevice(DeviceModel $device)
    {
        $this->devices->removeElement($device);
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
}
