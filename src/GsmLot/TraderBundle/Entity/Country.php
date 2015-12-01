<?php

namespace GsmLot\TraderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     * @ORM\Column(name="code",type="string",length=4)
     */
    private $code;
    
    /**
     * 
     * @var City
     * 
     * @ORM\OneToMany(targetEntity="GsmLot\TraderBundle\Entity\City",mappedBy="country")
     */
    protected $cities;
    
    
    
    
   
    
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
    
    /**
     * @return string
     */
    public function getCode()
    {
    	return $this->code;
    }
    
    /**
     * 
     * @param string $code
     */
    public function setCode($code)
    {
    	$this->code = $code;
    }
    
    
    /**
     * 
     * @return string
     */
    public function __toString(){
    	 
    	return $this->name;
    }
}
