<?php

namespace Supinfo\SupquotesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Supinfo\SupquotesBundle\Entity\Tag
 *
 * @ORM\Table(name="sq_tag")
 * @ORM\Entity
 */
class Tag
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
	* @ORM\OneToMany(targetEntity="Supinfo\SupquotesBundle\Entity\Quote", mappedBy="tag", cascade={"remove", "persist"})
	*/
	protected $quotes;

    /**
     * @var string $tag
     *
     * @ORM\Column(name="tag", type="string", length=50)
     */
    private $tag;


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
     * Set tag
     *
     * @param string $tag
     * @return Tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    
        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->quotes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add quotes
     *
     * @param Supinfo\SupquotesBundle\Entity\Quote $quotes
     * @return Tag
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
}