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
     * @ORM\Column(name="Name", type="string", length=255)
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
    

    /**
     * @var string
     *
     * @ORM\Column(name="District", type="string", length=255)
     */
    private $district;
    
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="Population", type="integer", length=255)
     */
    private $population;
    
    
   
    
    
    
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
	public function getCountryCode() {
		return $this->countryCode;
	}
	public function setCountryCode($countryCode) {
		$this->countryCode = $countryCode;
		return $this;
	}
	public function getDistricT() {
		return $this->districT;
	}
	public function setDistricT($districT) {
		$this->districT = $districT;
		return $this;
	}
	public function getPopulation() {
		return $this->population;
	}
	public function setPopulation($population) {
		$this->population = $population;
		return $this;
	}
	
    


    
   
}
