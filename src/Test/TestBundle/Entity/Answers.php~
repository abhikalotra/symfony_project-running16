<?php
namespace Test\TestBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="say_answer")
*/
class Answers
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
* @ORM\Column(type="integer")
*/
public $question_id;
/**
* @ORM\Column(type="string")
*/
public $user_name;

/**
* @ORM\Column(type="string")
*/
public $title;

/**
* @ORM\Column(type="string", length=2000)
*/
public $answer;

/**
* @ORM\Column(type="string", length=255)
*/
public $comments;

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
     * @return Answers
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
     * Set question_id
     *
     * @param integer $questionId
     * @return Answers
     */
    public function setQuestionId($questionId)
    {
        $this->question_id = $questionId;

        return $this;
    }

    /**
     * Get question_id
     *
     * @return integer 
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * Set user_name
     *
     * @param string $userName
     * @return Answers
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
     * Set title
     *
     * @param string $title
     * @return Answers
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
     * Set answer
     *
     * @param string $answer
     * @return Answers
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Answers
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
