<?php

namespace Supinfo\SupquotesBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Supinfo\SupquotesBundle\Entity\User
 *
 * @ORM\Table(name="sq_user")
 * @ORM\Entity
 */
class User extends BaseUser
{	
	public function __construct()
    {
        parent::__construct();
		$this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }
	
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
	* @ORM\OneToMany(targetEntity="Supinfo\SupquotesBundle\Entity\Quote", mappedBy="user", cascade={"remove", "persist"})
	*/
	protected $quotes;
	
	/**
	* @ORM\OneToMany(targetEntity="Supinfo\SupquotesBundle\Entity\Comment", mappedBy="user", cascade={"remove", "persist"})
	*/
	protected $comments;

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
     * @ORM\ManyToMany(targetEntity="Supinfo\SupquotesBundle\Entity\Group", inversedBy="users")
     * @ORM\JoinTable(name="sq_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * Add quotes
     *
     * @param Supinfo\SupquotesBundle\Entity\Quote $quotes
     * @return User
     */
    public function addQuote(\Supinfo\SupquotesBundle\Entity\Quote $quotes)
    {
        $this->quotes[] = $quotes;
    
        return $this;
    }

    /**
     * Remove quotes
     *
     * @param Supinfo\SupquotesBundle\Entity\Quote $quotes
     */
    public function removeQuote(\Supinfo\SupquotesBundle\Entity\Quote $quotes)
    {
        $this->quotes->removeElement($quotes);
    }

    /**
     * Get quotes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getQuotes()
    {
        return $this->quotes;
    }

    /**
     * Add comments
     *
     * @param Supinfo\SupquotesBundle\Entity\Comment $comments
     * @return User
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