<?php

namespace GsmLot\TraderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 * @ORM\Table(name="city")
 * @ORM\Entity
 */
class City
{
    /**
     * @var integer
     *
     * @ORM\Column(name="city_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var Country
     * 
     * @ORM\ManyToOne(targetEntity="GsmLot\TraderBundle\Entity\Country",inversedBy="cities")
     * @ORM\JoinColumn(name="country_id",referencedColumnName="country_id")
     * 
     */
    protected $country;
    
    
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getCountry() {
		return $this->country;
	}
	public function setCountry(Country $country) {
		$this->country = $country;
		return $this;
	}
	
    public function __toString(){
    	
    	return $this->name;
    }

    
   
}
