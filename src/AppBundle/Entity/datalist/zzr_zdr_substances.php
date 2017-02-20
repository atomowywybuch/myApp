<?php

namespace AppBundle\Entity\datalist;

use Doctrine\ORM\Mapping as ORM;

/**
 * zzr_zdr_substances
 *
 * @ORM\Table(name="datalistzzr_zdr_substances")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\datalist\zzr_zdr_substancesRepository")
 */
class zzr_zdr_substances
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
     * @ORM\Column(name="cas", type="string", length=255)
     */
    private $cas;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="increased_risk", type="float")
     */
    private $increasedRisk;

    /**
     * @var float
     *
     * @ORM\Column(name="significant_risk", type="float")
     */
    private $significantRisk;


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
     * @return zzr_zdr_substances
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
     * @return zzr_zdr_substances
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
     * Set description
     *
     * @param string $description
     *
     * @return zzr_zdr_substances
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
     * Set increasedRisk
     *
     * @param float $increasedRisk
     *
     * @return zzr_zdr_substances
     */
    public function setIncreasedRisk($increasedRisk)
    {
        $this->increasedRisk = $increasedRisk;

        return $this;
    }

    /**
     * Get increasedRisk
     *
     * @return float
     */
    public function getIncreasedRisk()
    {
        return $this->increasedRisk;
    }

    /**
     * Set significantRisk
     *
     * @param float $significantRisk
     *
     * @return zzr_zdr_substances
     */
    public function setSignificantRisk($significantRisk)
    {
        $this->significantRisk = $significantRisk;

        return $this;
    }

    /**
     * Get significantRisk
     *
     * @return float
     */
    public function getSignificantRisk()
    {
        return $this->significantRisk;
    }
}

