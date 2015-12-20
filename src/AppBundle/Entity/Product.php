<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
     */
    protected $categoryId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $link;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $price;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $salePrice;

    /**
     * @ORM\Column(type="boolean", options={"default": true})
     */
    protected $isActive;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\ManyToMany(targetEntity="category")
     * @ORM\JoinTable(name="products_categories",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id", unique=true)}
     *      )
     */
    protected $category;

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
     *
     * @return Products
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
     * Set link
     *
     * @param string $link
     *
     * @return Products
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Products
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set salePrice
     *
     * @param string $salePrice
     *
     * @return Products
     */
    public function setSalePrice($salePrice)
    {
        $this->salePrice = $salePrice;

        return $this;
    }

    /**
     * Get salePrice
     *
     * @return string
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Products
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Products
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
     * Constructor
     */
    public function __construct()
    {
        $this->categoryId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categoryId
     *
     * @param \AppBundle\Entity\Product $categoryId
     *
     * @return Product
     */
    public function addCategoryId(\AppBundle\Entity\Product $categoryId)
    {
        $this->categoryId[] = $categoryId;

        return $this;
    }

    /**
     * Remove categoryId
     *
     * @param \AppBundle\Entity\Product $categoryId
     */
    public function removeCategoryId(\AppBundle\Entity\Product $categoryId)
    {
        $this->categoryId->removeElement($categoryId);
    }

    /**
     * Get categoryId
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\category $category
     *
     * @return Product
     */
    public function setCategory(\AppBundle\Entity\category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add category
     *
     * @param \AppBundle\Entity\category $category
     *
     * @return Product
     */
    public function addCategory(\AppBundle\Entity\category $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\category $category
     */
    public function removeCategory(\AppBundle\Entity\category $category)
    {
        $this->category->removeElement($category);
    }
}
