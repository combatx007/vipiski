<?php

namespace Vip\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Vip\SiteBundle\Entity\Order;


/**
 * @ORM\Entity
 * @ORM\Table(name="term")
 */
class Term
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
     * @ORM\ManyToMany(targetEntity="\Vip\SiteBundle\Entity\Order", mappedBy="term")
     */
    private $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
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
     * Add orders
     *
     * @param \Vip\SiteBundle\Entity\Order $orders
     * @return Term
     */
    public function addOrder(\Vip\SiteBundle\Entity\Order $orders)
    {
        $this->orders[] = $orders;
    
        return $this;
    }

    /**
     * Remove orders
     *
     * @param \Vip\SiteBundle\Entity\Order $orders
     */
    public function removeOrder(\Vip\SiteBundle\Entity\Order $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }
}