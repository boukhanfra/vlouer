<?php

namespace GsmLot\TraderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\FloatType;

/**
 * country
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Country
{
    /**
     * @var string
     *
     * @ORM\Column(name="country_id", type="string",length=4)
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=150)
     */
    private $name;
    
    

    /**
     * @var string
     *
     * @ORM\Column(name="Continent", type="string", length=150, nullable=true)
     */
    private $continent;
    
    

    /**
     * @var string
     *
     * @ORM\Column(name="Region", type="string", length=150, nullable=true)
     */
    private $region;
    
    

    /**
     * @var string
     *
     * @ORM\Column(name="SurfaceArea", type="float", length=150, nullable=true)
     */
    private $surfaceArea;
    

    /**
     * @var float
     *
     * @ORM\Column(name="IndepYear", type="integer", nullable=true)
     */
    private $indepYear;
    
 
    /**
     * @var integer
     *
     * @ORM\Column(name="Population", type="integer", nullable=true)
     */
    private $population;
    
    
    /**
     * @var float
     *
     * @ORM\Column(name="LifeExpectancy", type="float", nullable=true)
     */
    private $lifeExpectancy;
    
    /**
     * @var float
     *
     * @ORM\Column(name="GNP", type="float", nullable=true)
     */
    private $gnp;
    
    
    /**
     * @var float
     *
     * @ORM\Column(name="GNPOld", type="float", nullable=true)
     */
    private $gnpOld;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="LocalName", type="string", length=150, nullable=true)
     */
    private $localName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="GovernmentForm", type="string", length=150, nullable=true)
     */
    private $governmentForm;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="HeadOfState", type="string", length=150, nullable=true)
     */
    private $headOfState;
    
    

    /**
     * @var integer
     *
     * @ORM\Column(name="Capital", type="integer", nullable=true)
     */
    private $capital;
    

    /**
     * @var string
     *
     * @ORM\Column(name="Code", type="string", length=15, nullable=true)
     */
    private $code;
    
 
    /**
     * 
     * @var City
     * 
     * @ORM\OneToMany(targetEntity="GsmLot\TraderBundle\Entity\City",mappedBy="country")
     */
    protected $cities;
   
    
    
    
    
    public function __toString(){
    	 
    	return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cities = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param int $id
     *
     * @return Country
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return int
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
     * @return Country
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
     * Set continent
     *
     * @param string $continent
     *
     * @return Country
     */
    public function setContinent($continent)
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * Get continent
     *
     * @return string
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Country
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set surfaceArea
     *
     * @param float $surfaceArea
     *
     * @return Country
     */
    public function setSurfaceArea($surfaceArea)
    {
        $this->surfaceArea = $surfaceArea;

        return $this;
    }

    /**
     * Get surfaceArea
     *
     * @return float
     */
    public function getSurfaceArea()
    {
        return $this->surfaceArea;
    }

    /**
     * Set indepYear
     *
     * @param int $indepYear
     *
     * @return Country
     */
    public function setIndepYear($indepYear)
    {
        $this->indepYear = $indepYear;

        return $this;
    }

    /**
     * Get indepYear
     *
     * @return int
     */
    public function getIndepYear()
    {
        return $this->indepYear;
    }

    /**
     * Set lifeExpectancy
     *
     * @param float $lifeExpectancy
     *
     * @return Country
     */
    public function setLifeExpectancy($lifeExpectancy)
    {
        $this->lifeExpectancy = $lifeExpectancy;

        return $this;
    }

    /**
     * Get lifeExpectancy
     *
     * @return float
     */
    public function getLifeExpectancy()
    {
        return $this->lifeExpectancy;
    }

    /**
     * Set gnp
     *
     * @param float $gnp
     *
     * @return Country
     */
    public function setGnp($gnp)
    {
        $this->gnp = $gnp;

        return $this;
    }

    /**
     * Get gnp
     *
     * @return float
     */
    public function getGnp()
    {
        return $this->gnp;
    }

    /**
     * Set gnpOld
     *
     * @param float $gnpOld
     *
     * @return Country
     */
    public function setGnpOld($gnpOld)
    {
        $this->gnpOld = $gnpOld;

        return $this;
    }

    /**
     * Get gnpOld
     *
     * @return float
     */
    public function getGnpOld()
    {
        return $this->gnpOld;
    }

    /**
     * Set localName
     *
     * @param string $localName
     *
     * @return Country
     */
    public function setLocalName($localName)
    {
        $this->localName = $localName;

        return $this;
    }

    /**
     * Get localName
     *
     * @return string
     */
    public function getLocalName()
    {
        return $this->localName;
    }

    /**
     * Set governmentForm
     *
     * @param string $governmentForm
     *
     * @return Country
     */
    public function setGovernmentForm($governmentForm)
    {
        $this->governmentForm = $governmentForm;

        return $this;
    }

    /**
     * Get governmentForm
     *
     * @return string
     */
    public function getGovernmentForm()
    {
        return $this->governmentForm;
    }

    /**
     * Set headOfState
     *
     * @param string $headOfState
     *
     * @return Country
     */
    public function setHeadOfState($headOfState)
    {
        $this->headOfState = $headOfState;

        return $this;
    }

    /**
     * Get headOfState
     *
     * @return string
     */
    public function getHeadOfState()
    {
        return $this->headOfState;
    }

    /**
     * Set capital
     *
     * @param int $capital
     *
     * @return Country
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get capital
     *
     * @return int
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Country
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Add city
     *
     * @param \GsmLot\TraderBundle\Entity\City $city
     *
     * @return Country
     */
    public function addCity(\GsmLot\TraderBundle\Entity\City $city)
    {
        $this->cities[] = $city;

        return $this;
    }

    /**
     * Remove city
     *
     * @param \GsmLot\TraderBundle\Entity\City $city
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCity(\GsmLot\TraderBundle\Entity\City $city)
    {
        return $this->cities->removeElement($city);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCities()
    {
        return $this->cities;
    }
}
