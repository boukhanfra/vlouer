<?php

namespace GsmLot\OfferBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offer Type
 *
 * @ORM\Table(name="offer_type")
 * @ORM\Entity
 */
class OfferType 
{
	
	/**
	* @var integer
	*
	* @ORM\Column(name="offer_type_id", type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	private $id;
	
	/**
	 * 
	 * @var string
	 * @ORM\Column(name="name",type="string",length=50)
	 */
	private $name;
	

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
     * @return OfferType
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
     * @return string
     */
    public function __toString()
    {
    	return $this->name;	
    }
}
