<?php

namespace Application\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Product
 */
class Product
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var string
     */
    private $color;

    /**
     * @var integer
     */
    private $stock;

    /**
     * @var \DateTime
     */
    private $publishDate = null;

    /**
     * @var ArrayCollection
     */
    private $companies;

    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->companies = new ArrayCollection();
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
     * @return Product
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
     * Set picture
     *
     * @param string $picture
     * @return Product
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Product
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Product
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set publish date
     *
     * @param \DateTime $publishDate
     * @return Product
     */
    public function setPublishDate(\DateTime $publishDate)
    {
        $this->publishDate = $publishDate;

        return $this;
    }

    /**
     * Get publish date
     *
     * @return DateTime
     */
    public function getPublishDate()
    {
        return $this->publishDate;
    }

    /**
     * @return boolean
     */
    public function isPublished()
    {
        return !is_null($this->publishDate) && $this->publishDate <= new \DateTime();
    }

    /**
     * Add a Company
     *
     * @param Company $company
     * @return Product
     */
    public function addCompany(Company $company)
    {
        $this->companies->add($company);

        return $this;
    }

    /**
     * Remove the $company
     *
     * @param Company $company
     * @return Product
     */
    public function removeCompany(Company $company)
    {
        foreach ($this->companies as $k => $c) {
            if ($c->getId() === $company->getId()) {
                $this->companies->remove($k);
                break;
            }
        }
        return $this;
    }

    /**
     * Get companies
     *
     * @return ArrayCollection
     */
    public function getCompanies()
    {
        return $this->companies;
    }
}
