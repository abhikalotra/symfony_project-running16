<?php
namespace Test\TestBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="ask_question")
*/
class Questions
{
/**
* @ORM\Id
* @ORM\Column(type="integer")
* @ORM\GeneratedValue(strategy="AUTO")
*/
public $id;
/**
* @ORM\Column(type="integer")
*/
public $user_id;
/**
* @ORM\Column(type="string")
*/
public $user_name;

/**
* @ORM\Column(type="string")
*/
public $title;
/**
* @ORM\Column(type="string")
*/
public $tags;
/**
* @ORM\Column(type="string")
*/
public $question;

/**
* @ORM\Column(type="string", length=500)
*/
public $description;

/**
* @ORM\Column(type="integer")
*/
public $views;




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
     * Set user_id
     *
     * @param integer $userId
     * @return Questions
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Questions
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set tags
     *
     * @param string $tags
     * @return Questions
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
         
   
    }

    /**
     * Set question
     *
     * @param string $question
     * @return Questions
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }


    /**
     * Set user_name
     *
     * @param string $userName
     * @return Questions
     */
    public function setUserName($userName)
    {
        $this->user_name = $userName;

        return $this;
    }

    /**
     * Get user_name
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Questions
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

    /**
     * Set views
     *
     * @param integer $views
     * @return Questions
     */
    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }

    /**
     * Get views
     *
     * @return integer 
     */
    public function getViews()
    {
        return $this->views;
    }
    
    
    	
     
}
