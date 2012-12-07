<?php

namespace Supinfo\SupquotesBundle\Entity;

use FOS\UserBundle\Entity\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
 * Supinfo\SupquotesBundle\Entity\Group
 *
 * @ORM\Table(name="sq_group")
 * @ORM\Entity
 */
class Group extends BaseGroup
{	
	public function __construct()
    {
        parent::__construct();
		$this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
	
	/**
     * @ORM\ManyToMany(targetEntity="Supinfo\SupquotesBundle\Entity\User", mappedBy="groups")
	 */
	protected $users;

    /**
     * Add users
     *
     * @param Supinfo\SupquotesBundle\Entity\User $users
     * @return Group
     */
    public function addUser(\Supinfo\SupquotesBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param Supinfo\SupquotesBundle\Entity\User $users
     */
    public function removeUser(\Supinfo\SupquotesBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}