<?php
namespace Admin\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="admin_tags")
*/
class Tags
{
/**
* @ORM\Id
* @ORM\Column(type="integer")
* @ORM\GeneratedValue(strategy="AUTO")
*/
public $id;

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
     * Set title
     *
     * @param string $title
     * @return Tags
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
     * @return Tags
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
     * Set comments
     *
     * @param string $comments
     * @return Tags
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
