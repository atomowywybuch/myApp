<?php

namespace AppBundle\Entity\datalist;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * _kobize
 *
 * @ORM\Table(name="datalist_kobize")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\datalist\_kobizeRepository")
 */
class _kobize
{
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\substances", mappedBy="kobize")
     */
    private $substance;

    public function __construct()
    {
        $this->substance = new ArrayCollection();
    }

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
     * @ORM\Column(name="number", type="string", length=255)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="cas", type="string", length=255)
     */
    private $cas;


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
     * Set number
     *
     * @param string $number
     *
     * @return _kobize
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return _kobize
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
     * Set cas
     *
     * @param string $cas
     *
     * @return _kobize
     */
    public function setCas($cas)
    {
        $this->cas = $cas;

        return $this;
    }

    /**
     * Get cas
     *
     * @return string
     */
    public function getCas()
    {
        return $this->cas;
    }

    public function __toString()
    {
      return (string) $this->getName();
    }

    /**
     * Add substance
     *
     * @param \AppBundle\Entity\substances $substance
     *
     * @return _kobize
     */
    public function addSubstance(\AppBundle\Entity\substances $substance)
    {
        $this->substance[] = $substance;

        return $this;
    }

    /**
     * Remove substance
     *
     * @param \AppBundle\Entity\substances $substance
     */
    public function removeSubstance(\AppBundle\Entity\substances $substance)
    {
        $this->substance->removeElement($substance);
    }

    /**
     * Get substance
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubstance()
    {
        return $this->substance;
    }
}
