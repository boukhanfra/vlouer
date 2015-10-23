<?php

namespace GoDaddy\UserBundle\Entity;

use FOS\UserBundle\Model\User AS BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author aziz
 * @abstract User Entity Class
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 */
class User extends BaseUser 
{
	
	/**
	 * @ORM\Id
	 * @ORM\Column(name="user_id",type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var integer $id
	 */
	protected $id;
	
}