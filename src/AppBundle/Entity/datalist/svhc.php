<?php

namespace AppBundle\Entity\datalist;

use Doctrine\ORM\Mapping as ORM;

/**
 * svhc
 *
 * @ORM\Table(name="datalistsvhc")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\datalist\svhcRepository")
 */
class svhc
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
     * @ORM\Column(name="we", type="string", length=255)
     */
    private $we;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="implementaion_date", type="date")
     */
    private $implementaionDate;

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
     * @return svhc
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
     * @return svhc
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
     * @return svhc
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
     * Set implementaionDate
     *
     * @param \DateTime $implementaionDate
     *
     * @return svhc
     */
    public function setImplementaionDate($implementaionDate)
    {
        $this->implementaionDate = $implementaionDate;

        return $this;
    }

    /**
     * Get implementaionDate
     *
     * @return \DateTime
     */
    public function getImplementaionDate()
    {
        return $this->implementaionDate;
    }

    /**
     * Set reason
     *
     * @param string $reason
     *
     * @return svhc
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
}

