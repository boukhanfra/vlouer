<?php

namespace GsmLot\IndexBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactMail
 *
 * @ORM\Table(name="contact_mail")
 * @ORM\Entity()
 */
class ContactMail
{
    /**
     * @var int
     *
     * @ORM\Column(name="contact_mail_id", type="integer")
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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="object_mail", type="string", length=255)
     */
    private $objectMail;

    /**
     * @var string
     *
     * @ORM\Column(name="messageMail", type="text")
     */
    private $messageMail;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=20)
     */
    private $ipAddress;


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
     * Set lastname
     *
     * @param string $lastname
     *
     * @return ContactMail
     */
    public function setLastName($lastname)
    {
        $this->lastName = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return ContactMail
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
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
     * Set objetmail
     *
     * @param string $objetmail
     *
     * @return ContactMail
     */
    public function setObjetmail($objetmail)
    {
        $this->objectMail = $objetmail;

        return $this;
    }

    /**
     * Get objetmail
     *
     * @return string
     */
    public function getObjetmail()
    {
        return $this->objectMail;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return ContactMail
     */
    public function setMessageMail($message)
    {
        $this->messageMail = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessageMail()
    {
        return $this->messageMail;
    }

    /**
     * Set ipadress
     *
     * @param string $ipadress
     *
     * @return ContactMail
     */
    public function setIpadress($ipadress)
    {
        $this->ipAddress = $ipadress;

        return $this;
    }

    /**
     * Get ipadress
     *
     * @return string
     */
    public function getIpadress()
    {
        return $this->ipAddress;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return ContactMail
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
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
     * Set objectMail
     *
     * @param string $objectMail
     *
     * @return ContactMail
     */
    public function setObjectMail($objectMail)
    {
        $this->objectMail = $objectMail;

        return $this;
    }

    /**
     * Get objectMail
     *
     * @return string
     */
    public function getObjectMail()
    {
        return $this->objectMail;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     *
     * @return ContactMail
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }
}
