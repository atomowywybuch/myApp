<?php

namespace AppBundle\Entity\datalist;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * _reach17
 *
 * @ORM\Table(name="datalist_reach17")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\datalist\_reach17Repository")
 */
class _reach17
{

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\substances", mappedBy="reach17")
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
     * @var string
     *
     * @ORM\Column(name="we", type="string", length=255)
     */
    private $we;

    /**
     * @var string
     *
     * @ORM\Column(name="conditions", type="string", length=255)
     */
    private $conditions;


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
     * @return _reach17
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
     * @return _reach17
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

    /**
     * Set we
     *
     * @param string $we
     *
     * @return _reach17
     */
    public function setWe($we)
    {
        $this->we = $we;

        return $this;
    }

    /**
     * Get we
     *
     * @return string
     */
    public function getWe()
    {
        return $this->we;
    }

    /**
     * Set conditions
     *
     * @param string $conditions
     *
     * @return _reach17
     */
    public function setConditions($conditions)
    {
        $this->conditions = $conditions;

        return $this;
    }

    /**
     * Get conditions
     *
     * @return string
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * Add substance
     *
     * @param \AppBundle\Entity\substances $substance
     *
     * @return _reach17
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
