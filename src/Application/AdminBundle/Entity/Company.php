<?php

namespace Application\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Company
 */
class Company
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
    private $country;

    /**
     * @var string
     */
    private $description;

    /**
     * @var ArrayCollection
     */
    private $products;


    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
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
     * @return Company
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
     * Set country
     *
     * @param string $country
     * @return Company
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Company
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add a Product
     *
     * @param Product $product
     * @return Company
     */
    public function addProduct(Product $product)
    {
        $this->products->add($product);

        return $this;
    }

    /**
     * Remove the $product
     *
     * @param Product $product
     * @return Company
     */
    public function removeProduct(Product $product)
    {
        foreach ($this->products as $k => $p) {
            if ($p->getId() === $product->getId()) {
                $this->products->remove($k);
                break;
            }
        }
        return $this;
    }

    /**
     * Get products
     *
     * @return ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
    }
}
