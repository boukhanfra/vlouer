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
	 * @var Norm
	 *
	 * @ORM\ManyToOne(targetEntity="GsmLot\OfferBundle\Entity\Norm")
	 * @ORM\JoinColumn(name="norm_id",referencedColumnName="norm_id")
	 */
	private $norm;
	
	
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
	 * @return Norm
	 */
	public function getNorm()
	{
		return $this->norm;
	}
	
	/**
	 * 
	 * @param Norm $norm
	 */
	public function setNorm(Norm $norm)
	{
		$this->norm = $norm;
	}
	
}