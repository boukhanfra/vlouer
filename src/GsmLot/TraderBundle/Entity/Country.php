<?php

namespace GsmLot\TraderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * country
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Country
{
    /**
     * @var integer
     *
     * @ORM\Column(name="country_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;
    
    
    /**
     * 
     * @var City
     * 
     * @ORM\OneToMany(targetEntity="GsmLot\TraderBundle\Entity\City")
     * @JoinColumn(name="city_id",referencedColumnName="city_id")
     */
    private $cities;
   
    
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
     * @return country
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Get cities
     * @return \GsmLot\TraderBundle\Entity\City
     */
    public function getCities()
    {
    	return $this->cities;
    }
    
}
