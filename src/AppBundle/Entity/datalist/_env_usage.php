<?php

namespace AppBundle\Entity\datalist;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * _env_usage
 *
 * @ORM\Table(name="datalist_env_usage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\datalist\_env_usageRepository")
 */
class _env_usage
{

    // ...

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\substances", mappedBy="env_usage")
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
     * @var float
     *
     * @ORM\Column(name="rate_per_kg", type="float")
     */
    private $ratePerKg;


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
     * @return _env_usage
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
     * Set ratePerKg
     *
     * @param float $ratePerKg
     *
     * @return _env_usage
     */
    public function setRatePerKg($ratePerKg)
    {
        $this->ratePerKg = $ratePerKg;

        return $this;
    }

    /**
     * Get ratePerKg
     *
     * @return float
     */
    public function getRatePerKg()
    {
        return $this->ratePerKg;
    }

    /**
     * Add substance
     *
     * @param \AppBundle\Entity\substances $substance
     *
     * @return _env_usage
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
