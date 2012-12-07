<?php

namespace Supinfo\SupquotesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Supinfo\SupquotesBundle\Entity\Quote
 *
 * @ORM\Table(name="sq_quote")
 * @ORM\Entity
 */
class Quote
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
	* @ORM\ManyToOne(targetEntity="Supinfo\SupquotesBundle\Entity\User", inversedBy="quotes", cascade={"remove"})
	* @ORM\JoinColumn(name="user_id", referencedColumnName="id")
	*/
	protected $user;
	
	/**
	* @ORM\ManyToOne(targetEntity="Supinfo\SupquotesBundle\Entity\Tag", inversedBy="quotes", cascade={"remove"})
	* @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
	*/
	protected $tag;
	
	/**
	* @ORM\OneToMany(targetEntity="Supinfo\SupquotesBundle\Entity\Comment", mappedBy="quote", cascade={"remove", "persist"})
	*/
	protected $comments;

    /**
     * @var string $quote
     *
     * @ORM\Column(name="quote", type="string", length=255)
     */
    private $quote;

    /**
     * @var \DateTime $date_created
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $date_created;

    /**
     * @var boolean $is_active
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $is_active;


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
     * Set quote
     *
     * @param string $quote
     * @return Quote
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;
    
        return $this;
    }

    /**
     * Get quote
     *
     * @return string 
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * Set date_created
     *
     * @param \DateTime $dateCreated
     * @return Quote
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
     * Set is_active
     *
     * @param boolean $isActive
     * @return Quote
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;
    
        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set user
     *
     * @param Supinfo\SupquotesBundle\Entity\User $user
     * @return Quote
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
     * Set tag
     *
     * @param Supinfo\SupquotesBundle\Entity\Tag $tag
     * @return Quote
     */
    public function setTag(\Supinfo\SupquotesBundle\Entity\Tag $tag = null)
    {
        $this->tag = $tag;
    
        return $this;
    }

    /**
     * Get tag
     *
     * @return Supinfo\SupquotesBundle\Entity\Tag 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Add comments
     *
     * @param Supinfo\SupquotesBundle\Entity\Comment $comments
     * @return Quote
     */
    public function addComment(\Supinfo\SupquotesBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param Supinfo\SupquotesBundle\Entity\Comment $comments
     */
    public function removeComment(\Supinfo\SupquotesBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}