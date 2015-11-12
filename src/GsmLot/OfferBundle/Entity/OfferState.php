<?php

namespace GsmLot\OfferBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * OfferState
 *
 * @ORM\Table(name="offer_state")
 * @ORM\Entity()
 */
class OfferState 
{
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="offer_state_id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string",nullable=false,length=50)
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
}