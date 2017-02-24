<?php

namespace AppBundle\Entity\datalist;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * _svhc
 *
 * @ORM\Table(name="datalist_svhc")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\datalist\_svhcRepository")
 */
class _svhc
{

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\substances", mappedBy="svhc")
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
     * @var \DateTime
     *
     * @ORM\Column(name="imp_date", type="date")
     */
    private $impDate;

    /**
     * @var string
     *
     * @ORM\Column(name="reason", type="string", length=255)
     */
    private $reason;


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
     * @return _svhc
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
     * @return _svhc
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
     * @return _svhc
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
     * Set impDate
     *
     * @param \DateTime $impDate
     *
     * @return _svhc
     */
    public function setImpDate($impDate)
    {
        $this->impDate = $impDate;

        return $this;
    }

    /**
     * Get impDate
     *
     * @return \DateTime
     */
    public function getImpDate()
    {
        return $this->impDate;
    }

    /**
     * Set reason
     *
     * @param string $reason
     *
     * @return _svhc
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Add substance
     *
     * @param \AppBundle\Entity\substances $substance
     *
     * @return _svhc
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

    public function __toString()
    {
      return (string) $this->getName();
    }
}
