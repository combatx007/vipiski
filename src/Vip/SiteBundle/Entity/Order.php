<?php

namespace Vip\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Vip\SiteBundle\Entity\Term;


/**
 * @ORM\Entity
 * @ORM\Table(name="order")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $ogrn;

    /**
     * @ORM\Column(type="string")
     */
    protected $inn;

    /**
     * @ORM\Column(type="integer")
     */
    protected $count;

    /**
     * @ORM\ManyToOne(targetEntity="Vip\UserBundle\Entity\User", inversedBy="orders")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;


    /**
     * @ORM\Column(type="text")
     */
    protected $dostavka;

    /**
     * @ORM\Column(type="text")
     */
    protected $speed;

    /**
     * @ORM\Column(type="text")
     */
    protected $price;



    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\ManyToMany(targetEntity="Vip\SiteBundle\Entity\Term", inversedBy="orders")
     * @ORM\JoinTable(name="term_to_order")
     */
    private $term;


    public function __construct()
    {
        $this->created = new \DateTime();
        $this->user = new ArrayCollection();
        $this->term = new ArrayCollection();
    }

    /**
     * @ORM\PreUpdate
     */
    public function doStuffOnPreUpdate()
    {
        $this->setCreated($this->getCreated());
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
     * Set inn
     *
     * @param string $inn
     * @return Order
     */
    public function setInn($inn)
    {
        $this->inn = $inn;

        return $this;
    }

    /**
     * Get inn
     *
     * @return string
     */
    public function getInn()
    {
        return $this->inn;
    }

    /**
     * Set count
     *
     * @param integer $count
     * @return Order
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return Order
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }


    /**
     * Set name
     *
     * @param string $name
     * @return Order
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
     * Set ogrn
     *
     * @param string $ogrn
     * @return Order
     */
    public function setOgrn($ogrn)
    {
        $this->ogrn = $ogrn;

        return $this;
    }

    /**
     * Get ogrn
     *
     * @return string
     */
    public function getOgrn()
    {
        return $this->ogrn;
    }

    /**
     * Set dostavka
     *
     * @param string $dostavka
     * @return Order
     */
    public function setDostavka($dostavka)
    {
        $this->dostavka = $dostavka;

        return $this;
    }

    /**
     * Get dostavka
     *
     * @return string
     */
    public function getDostavka()
    {
        return $this->dostavka;
    }


    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Order
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }


    /**
     * Set speed
     *
     * @param string $speed
     * @return Order
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set type
     *
     * @param string $price
     * @return Order
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add term
     *
     * @param \Vip\SiteBundle\Entity\Term $term
     * @return Order
     */
    public function addTerm(\Vip\SiteBundle\Entity\Term $term)
    {
        $this->term[] = $term;

        return $this;
    }

    /**
     * Remove term
     *
     * @param \Vip\SiteBundle\Entity\Term $term
     */
    public function removeTerm(\Vip\SiteBundle\Entity\Term $term)
    {
        $this->term->removeElement($term);
    }

    /**
     * Get term
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTerm()
    {
        return $this->term;
    }
}