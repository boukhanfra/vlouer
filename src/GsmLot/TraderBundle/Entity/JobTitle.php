<?php

namespace GsmLot\TraderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @author aziz
 * @ORM\Table(name="job_title")
 * @ORM\Entity()
 */
class JobTitle
{
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="job_title_id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	
	/**
	 * 
	 * @var string $name
	 * 
	 * @ORM\Column(name="name",type="string",length=100)
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
     * @return JobTitle
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
}
