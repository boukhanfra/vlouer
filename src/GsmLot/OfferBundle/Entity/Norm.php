<?php

namespace GsmLot\OfferBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Nom
 *
 * @ORM\Table(name="norm")
 * @ORM\Entity
 */
class Norm
{
		
	/**
	 * 
	 * @var integer $id
	 * @ORM\Column(name="norm_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	
	/**
	 * 
	 * @var string $name
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $name;
	
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
	 * @return string
	 */
	public function __toString()
	{
		return $this->name;
	}
}
