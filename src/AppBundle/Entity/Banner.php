<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="banner")
 */
class Banner
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $link;

    /**
     * @ORM\Column(type="boolean", options={"default": true})
     */
    protected $isActive;

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
     * @return Banner
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
     * Set path
     *
     * @param string $link
     *
     * @return Banner
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set isActive
     *
     * @param \bool $isActive
     *
     * @return Banner
     */
    public function setIsActive(\bool $isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return \bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}
