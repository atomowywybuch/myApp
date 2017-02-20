<?php

namespace AppBundle\Entity\datalist;

use Doctrine\ORM\Mapping as ORM;

/**
 * reach17
 *
 * @ORM\Table(name="datalistreach17")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\datalist\reach17Repository")
 */
class reach17
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
     * @var string
     *
     * @ORM\Column(name="r17_condition", type="string", length=255)
     */
    private $r17_condition;


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
     * @return reach17
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
     * @return reach17
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
     * @return reach17
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
     * Set r17_condition
     *
     * @param string $r17_condition
     *
     * @return reach17
     */
    public function setr17_condition($r17_condition)
    {
        $this->r17_condition = $r17_condition;

        return $this;
    }

    /**
     * Get r17_condition
     *
     * @return string
     */
    public function getr17_condition()
    {
        return $this->r17_condition;
    }
}
