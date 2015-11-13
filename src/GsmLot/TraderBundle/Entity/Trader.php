<?php

namespace GsmLot\TraderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use GsmLot\OfferBundle\Entity\Offer;
use GsmLot\SubscriptionBundle\Entity\Subscription;
use GsmLot\UserBundle\Entity\User;
use GsmLot\MailBoxBundle\Entity\Message;

/**
 * Trader
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GsmLot\TraderBundle\Repository\TraderRepository")
 */
class Trader
{
    /**
     * @var integer
     *
     * @ORM\Column(name="trader_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=100)
     */
    private $company;


    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile_number", type="string", length=14)
     */
    private $mobileNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="land_mobile_number", type="string", length=14)
     */
    private $fixedNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="fax_number", type="string", length=255)
     */
    private $faxNumber;
    
    
    /**
     * 
     * @var User
     * 
     * @ORM\OneToOne(targetEntity="GsmLot\UserBundle\Entity\User",inversedBy="trader")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    protected $user;

    
	/**
	 * 
	 * @var JobTitle
	 * 
	 * @ORM\ManyToOne(targetEntity="GsmLot\TraderBundle\Entity\JobTitle")
	 * @ORM\JoinColumn(name="job_title_id",referencedColumnName="job_title_id")
	 */
    protected $jobTitle;
    
    
   	/**
   	 * 
   	 * 
   	 * @ORM\OneToMany(targetEntity="GsmLot\MailBoxBundle\Entity\Message",mappedBy="receiverTrader")
   	 */
    protected $messagesReceived;


    /**
     *
     *
     * @ORM\OneToMany(targetEntity="GsmLot\MailBoxBundle\Entity\Message",mappedBy="senderTrader")
     */
    protected $messagesSent;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="GsmLot\TraderBundle\Entity\City")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="city_id")
     */
    protected $city;
    
    /**
     * @ORM\OneToMany(targetEntity="GsmLot\OfferBundle\Entity\Offer", mappedBy="trader")
     */
    protected $offers;
    
 
    /**
     * @ORM\OneToMany(targetEntity="GsmLot\SubscriptionBundle\Entity\Subscription", mappedBy="trader")
     */
    protected $subscriptions;
    

    public function __construct()
    {
    	$this->offers = new ArrayCollection();
    	$this->subscriptions = new ArrayCollection();
    	$this->messagesReceived = new ArrayCollection();
    	$this->messagesSent = new ArrayCollection();
    }
    
    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Trader
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Trader
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Trader
     */
    public function setCompany($company)
    {
        $this->company = $company;

        
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set jobTitle
     *
     * @param JobTitle $jobTitle
     *
     * @return Trader
     */
    public function setJobTitle(JobTitle $jobTitle)
    {
        $this->jobTitle = $jobTitle;

        
    }

    /**
     * Get jobTitle
     *
     * @return JobTitle
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

   

    /**
     * Set mobileNumber
     *
     * @param string $mobileNumber
     *
     * @return Trader
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;

        
    }

    /**
     * Get mobileNumber
     *
     * @return string
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * Set fixedNumber
     *
     * @param string $fixedNumber
     *
     * @return Trader
     */
    public function setFixedNumber($fixedNumber)
    {
        $this->fixedNumber = $fixedNumber;

        
    }

    /**
     * Get fixedNumber
     *
     * @return string
     */
    public function getFixedNumber()
    {
        return $this->fixedNumber;
    }

    /**
     * Set faxNumber
     *
     * @param string $faxNumber
     *
     * @return Trader
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;

        
    }

    /**
     * Get faxNumber
     *
     * @return string
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }
    
    

    public function setCountry(Country $country )
    {
  
    }

    
    
    public function getCountry()
    {
    	if($this->city)
        return $this->city->getCountry();
    }

 
    public function setCity(City $city )
    {
        $this->city = $city;

        
    }

    
    public function getCity()
    {
        return $this->city;
    }




    /**
     * Get offers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOffers()
    {
        return $this->offers;
    }


    /**
     * Get subscriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }
    
    
    public function getMessagesReceived()
    {
    	return $this->messagesReceived;
    }
    
    
    public function getMessagesSent()
    {
    	return $this->messagesSent;
    }
	public function getAddress() {
		return $this->address;
	}
	public function setAddress($address) {
		$this->address = $address;
		return $this;
	}


	public function setUser(User $user) {
		$this->user = $user;
		//return $this;
	}
	
	
	/**
	 * @return User
	 */
	public function getUser()
	{
		return $this->user;
	}
    
}
