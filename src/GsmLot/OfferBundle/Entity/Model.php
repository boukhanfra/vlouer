<?php

namespace GsmLot\OfferBundle\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * Model
 *
 * @ORM\Table(name="model")
 * @ORM\Entity
 */
class Model 
{
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="model_id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string")
	 */
	private $name;
	
	/**
	 * 
	 * @var Brand $brand
	 * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\Brand")
	 * @ORM\JoinColumn(name="brand_id",referencedColumnName="brand_id")
	 * 
	 */
	private $brand;
	
	/**
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * 
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}
	

    /**
     * Set brand
     *
     * @param \GsmLot\OfferBundle\Entity\Brand $brand
     *
     * @return Model
     */
    public function setBrand(\GsmLot\OfferBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \GsmLot\OfferBundle\Entity\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
    	return $this->name;
    }
}
