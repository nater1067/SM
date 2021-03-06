<?php
namespace SM\ChatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="model")
 * @UniqueEntity(fields = "username", targetClass = "SM\ChatBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "SM\ChatBundle\Entity\User", message="fos_user.email.already_used")
 */
class Model extends User
{
    /**
     * @ORM\Column(type="string", nullable=true);
     */
    protected $activeStreamSessionId;

    /**
     * @ORM\Column(type="text", nullable=true);
     */
    protected $activeStreamToken;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->roles = array(self::ROLE_MODEL);
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
     * Set age
     *
     * @param integer $age
     * @return Model
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }


    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Model
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
     * Set lastName
     *
     * @param string $lastName
     * @return Model
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
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
     * Set nickname
     *
     * @param string $nickname
     * @return Model
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Model
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set activeStream
     *
     * @param string $activeStream
     * @return Model
     */
    public function setActiveStream($activeStream)
    {
        $this->activeStream = $activeStream;

        return $this;
    }

    /**
     * Get activeStream
     *
     * @return string 
     */
    public function getActiveStream()
    {
        return $this->activeStream;
    }

    /**
     * Set activeStreamSessionId
     *
     * @param string $activeStreamSessionId
     * @return Model
     */
    public function setActiveStreamSessionId($activeStreamSessionId)
    {
        $this->activeStreamSessionId = $activeStreamSessionId;

        return $this;
    }

    /**
     * Get activeStreamSessionId
     *
     * @return string 
     */
    public function getActiveStreamSessionId()
    {
        return $this->activeStreamSessionId;
    }

    /**
     * Set activeStreamToken
     *
     * @param string $activeStreamToken
     * @return Model
     */
    public function setActiveStreamToken($activeStreamToken)
    {
        $this->activeStreamToken = $activeStreamToken;

        return $this;
    }

    /**
     * Get activeStreamToken
     *
     * @return string 
     */
    public function getActiveStreamToken()
    {
        return $this->activeStreamToken;
    }
}
