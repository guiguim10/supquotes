<?php

namespace Supinfo\SupquotesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Supinfo\SupquotesBundle\Entity\Comment
 *
 * @ORM\Table(name="sq_comment")
 * @ORM\Entity
 */
class Comment
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	
	/**
	* @ORM\ManyToOne(targetEntity="Supinfo\SupquotesBundle\Entity\User", inversedBy="comments", cascade={"remove"})
	* @ORM\JoinColumn(name="user_id", referencedColumnName="id")
	*/
	protected $user;
	
	/**
	* @ORM\ManyToOne(targetEntity="Supinfo\SupquotesBundle\Entity\Quote", inversedBy="comments", cascade={"remove"})
	* @ORM\JoinColumn(name="quote_id", referencedColumnName="id")
	*/
	protected $quote;

    /**
     * @var string $comment
     *
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;

    /**
     * @var boolean $is_visible
     *
     * @ORM\Column(name="is_visible", type="boolean")
     */
    private $is_visible;

    /**
     * @var \DateTime $date_created
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $date_created;


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
     * Set comment
     *
     * @param string $comment
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set is_visible
     *
     * @param boolean $isVisible
     * @return Comment
     */
    public function setIsVisible($isVisible)
    {
        $this->is_visible = $isVisible;
    
        return $this;
    }

    /**
     * Get is_visible
     *
     * @return boolean 
     */
    public function getIsVisible()
    {
        return $this->is_visible;
    }

    /**
     * Set date_created
     *
     * @param \DateTime $dateCreated
     * @return Comment
     */
    public function setDateCreated($dateCreated)
    {
        $this->date_created = $dateCreated;
    
        return $this;
    }

    /**
     * Get date_created
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Set user
     *
     * @param Supinfo\SupquotesBundle\Entity\User $user
     * @return Comment
     */
    public function setUser(\Supinfo\SupquotesBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return Supinfo\SupquotesBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set quote
     *
     * @param Supinfo\SupquotesBundle\Entity\Quote $quote
     * @return Comment
     */
    public function setQuote(\Supinfo\SupquotesBundle\Entity\Quote $quote = null)
    {
        $this->quote = $quote;
    
        return $this;
    }

    /**
     * Get quote
     *
     * @return Supinfo\SupquotesBundle\Entity\Quote 
     */
    public function getQuote()
    {
        return $this->quote;
    }
}