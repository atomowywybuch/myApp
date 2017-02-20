<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dangers
 *
 * @ORM\Table(name="dangers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DangersRepository")
 */
class Dangers
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="pictogram", type="string", length=255)
     */
    private $pictogram;

    /**
     * @var string
     *
     * @ORM\Column(name="pictodescription", type="string", length=255)
     */
    private $pictodescription;


    /**
     * Get id
     *
     * @return int
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
     * @return Dangers
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
     * Set category
     *
     * @param string $category
     *
     * @return Dangers
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set pictogram
     *
     * @param string $pictogram
     *
     * @return Dangers
     */
    public function setPictogram($pictogram)
    {
        $this->pictogram = $pictogram;

        return $this;
    }

    /**
     * Get pictogram
     *
     * @return string
     */
    public function getPictogram()
    {
        return $this->pictogram;
    }

    /**
     * Set pictodescription
     *
     * @param string $pictodescription
     *
     * @return Dangers
     */
    public function setPictodescription($pictodescription)
    {
        $this->pictodescription = $pictodescription;

        return $this;
    }

    /**
     * Get pictodescription
     *
     * @return string
     */
    public function getPictodescription()
    {
        return $this->pictodescription;
    }
}

