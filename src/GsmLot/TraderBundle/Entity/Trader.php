<?php

namespace GsmLot\TraderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use GsmLot\ProductBundle\Entity\Offer;
use GsmLot\SubscriptionBundle\Entity\Subscription;
use GsmLot\UserBundle\Entity\User;
use GsmLot\MailBox\Entity\Message;

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
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $adress;

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
     * @ORM\OneToOne(targetEntity="GsmLot\UserBundle\Entity\User")
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
   	 * @var Message
   	 * 
   	 * @ORM\OneToMany(targetEntity="GsmLot\MailBox\Entity\Message")
   	 * @ORM\JoinColumn(name="trader_id",referencedColumnName="trader_id")
   	 */
    protected $messages;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="city_id")
     */
    protected $city;
    
    /**
     * @ORM\OneToMany(targetEntity="Offer", mappedBy="Trader")
     */
    protected $offers;
    
 
    /**
     * @ORM\OneToMany(targetEntity="Subscription", mappedBy="Trader")
     */
    protected $subscriptions;
    

    public function __construct()
    {
    	$this->offers = new ArrayCollection();
    	$this->subscriptions = new ArrayCollection();
    	$this->messages = new ArrayCollection();
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
     * Set email
     *
     * @param string $email
     *
     * @return Trader
     */
    public function setEmail($email)
    {
        $this->email = $email;

        
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Trader
     */
    public function setAddress($address)
    {
        $this->address = $address;

    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
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
    
    
    /**
     * Set country
     *
     * @param \AppBundle\Entity\country $country
     *
     * @return Trader
     */
    public function setCountry(Country $country = null)
    {
        $this->country = $country;

        
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return Trader
     */
    public function setCity(City $city = null)
    {
        $this->city = $city;

        
    }

    /**
     * Get city
     *
     * @return \AppBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Add offer
     *
     * @param \AppBundle\Entity\Offer $offer
     *
     * @return Trader
     */
    public function addOffer(Offer $offer)
    {
        $this->offers[] = $offer;

        
    }

    /**
     * Remove offer
     *
     * @param \AppBundle\Entity\Offer $offer
     */
    public function removeOffer(Offer $offer)
    {
        $this->offers->removeElement($offer);
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
     * Add subscription
     *
     * @param Subscription $subscription
     *
     * @return Trader
     */
    public function addSubscription(Subscription $subscription)
    {
        $this->subscriptions[] = $subscription;

    }

    /**
     * Remove subscription
     *
     * @param Subscription $subscription
     */
    public function removeSubscription(Subscription $subscription)
    {
        $this->subscriptions->removeElement($subscription);
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
}
