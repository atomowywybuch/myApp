<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * substances
 *
 * @ORM\Table(name="substances")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\substancesRepository")
 */
class substances
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\datalist\_kobize", inversedBy="substance")
     * @ORM\JoinColumn(name="kobize_id", referencedColumnName="id")
     */
    private $kobize;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\datalist\_env_usage", inversedBy="substance")
     * @ORM\JoinColumn(name="env_usage_id", referencedColumnName="id")
     */
    private $env_usage;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\datalist\_druglike", inversedBy="substance")
     * @ORM\JoinColumn(name="druglike_id", referencedColumnName="id")
     */
    private $druglike;

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
     * @ORM\Column(name="vpressure", type="string", length=255)
     */
    private $vpressure;


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
     * @return substances
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
     * @return substances
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
     * @return substances
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
     * Set vpressure
     *
     * @param string $vpressure
     *
     * @return substances
     */
    public function setVpressure($vpressure)
    {
        $this->vpressure = $vpressure;

        return $this;
    }

    /**
     * Get vpressure
     *
     * @return string
     */
    public function getVpressure()
    {
        return $this->vpressure;
    }

    /**
     * Set envUsage
     *
     * @param \AppBundle\Entity\datalist\_env_usage $envUsage
     *
     * @return substances
     */
    public function setEnvUsage(\AppBundle\Entity\datalist\_env_usage $envUsage = null)
    {
        $this->env_usage = $envUsage;

        return $this;
    }

    /**
     * Get envUsage
     *
     * @return \AppBundle\Entity\datalist\_env_usage
     */
    public function getEnvUsage()
    {
        return $this->env_usage;
    }

    /**
     * Set druglike
     *
     * @param \AppBundle\Entity\datalist\_druglike $druglike
     *
     * @return substances
     */
    public function setDruglike(\AppBundle\Entity\datalist\_druglike $druglike = null)
    {
        $this->druglike = $druglike;

        return $this;
    }

    /**
     * Get druglike
     *
     * @return \AppBundle\Entity\datalist\_druglike
     */
    public function getDruglike()
    {
        return $this->druglike;
    }

    /**
     * Set kobize
     *
     * @param \AppBundle\Entity\datalist\_kobize $kobize
     *
     * @return substances
     */
    public function setKobize(\AppBundle\Entity\datalist\_kobize $kobize = null)
    {
        $this->kobize = $kobize;

        return $this;
    }

    /**
     * Get kobize
     *
     * @return \AppBundle\Entity\datalist\_kobize
     */
    public function getKobize()
    {
        return $this->kobize;
    }
}
