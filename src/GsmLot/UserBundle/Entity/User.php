<?php

namespace GsmLot\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use GsmLot\TraderBundle\Entity\Trader;


/**
 * 
 * @author aziz
 * @ORM\Entity()
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
	/**
	 * @ORM\Id
	 * @ORM\Column(name="user_id",type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * 
	 * @var Trader
	 * @ORM\OneToOne(targetEntity="GsmLot\UserBundle\Entity\Trader",inversedBy="trader")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
	 */
	protected $trader;
	
	public function __construct(){
		
		parent::__construct();
	}
	
	
	/**
	 * @return Trader
	 */
	public function getTrader()
	{
		return $this->trader;	
	}
	
	
	/**
	 * 
	 * @param Trader $trader
	 */
	public function setTrader(Trader $trader)
	{
		$this->trader = $trader;
		
		$this->trader->setEmail($this->getEmail());
	}
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	
}