<?php

namespace Test\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enquiry
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Enquiry
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

	
	 /**
     * @var string
     *
     * @ORM\Column(name="last", type="string")
     */
    private $last;

	
	 /**
     * @var string
     *
     * @ORM\Column(name="username", type="string")
     */
    private $username;
	
	
	 /**
     * @var string
     *
     * @ORM\Column(name="password", type="string" , length=225 )
     */
    private $password;
	
	 /**
     * @var string
     *
     * @ORM\Column(name="email", type="string" , length=225 )
     */
    private $email;
	

	
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
     * Set name
     *
     * @param string $name
     * @return Enquiry
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
     * Set description
     *
     * @param string $description
     * @return Enquiry
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    
   //create by own
    
       public function setLast($last)
    {
        $this->last = $last;

        return $this;
    }
      public function getLast()
    {
        return $this->last;
    }
    
    //username
       public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
      public function getUsername()
    {
        return $this->username;
    }
    //password
       public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
      public function getPassword()
    {
        return $this->password;
    }
    //email
       public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
      public function getEmail()
    {
        return $this->email;
    }

    
}
