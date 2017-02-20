<?php

namespace AppBundle\Entity\datalist;

use Doctrine\ORM\Mapping as ORM;

/**
 * reach14
 *
 * @ORM\Table(name="datalistreach14")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\datalist\reach14Repository")
 */
class reach14
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
     * @return reach14
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
     * @return reach14
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
     * @return reach14
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
}

