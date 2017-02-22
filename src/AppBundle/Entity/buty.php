<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * buty
 *
 * @ORM\Table(name="buty")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\butyRepository")
 */
class buty
{

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\datalists\colors", inversedBy="buty")
     * @ORM\JoinColumn(name="color_id", referencedColumnName="id")
     */
    private $kolor;

    /**
     * @ORM\ManyToOne(targetEntity="rozmiary", inversedBy="buty")
     * @ORM\JoinColumn(name="rozmiar_id", referencedColumnName="id")
     */
    private $rozmiar;


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
     * @ORM\Column(name="but", type="string", length=255)
     */
    private $but;

    /**
     * @var int
     *
     * @ORM\Column(name="color_id", type="integer")
     */
    private $colorId;


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
     * Set but
     *
     * @param string $but
     *
     * @return buty
     */
    public function setBut($but)
    {
        $this->but = $but;

        return $this;
    }

    /**
     * Get but
     *
     * @return string
     */
    public function getBut()
    {
        return $this->but;
    }

    /**
     * Set colorId
     *
     * @param integer $colorId
     *
     * @return buty
     */
    public function setColorId($colorId)
    {
        $this->colorId = $colorId;

        return $this;
    }

    /**
     * Get colorId
     *
     * @return int
     */
    public function getColorId()
    {
        return $this->colorId;
    }

    /**
     * Set kolor
     *
     * @param \AppBundle\Entity\datalists\colors $kolor
     *
     * @return buty
     */
    public function setKolor(\AppBundle\Entity\datalists\colors $kolor = null)
    {
        $this->kolor = $kolor;

        return $this;
    }

    /**
     * Get kolor
     *
     * @return \AppBundle\Entity\datalists\colors
     */
    public function getKolor()
    {
        return $this->kolor;
    }

    /**
     * Set rozmiar
     *
     * @param \AppBundle\Entity\rozmiary $rozmiar
     *
     * @return buty
     */
    public function setRozmiar(\AppBundle\Entity\rozmiary $rozmiar = null)
    {
        $this->rozmiar = $rozmiar;

        return $this;
    }

    /**
     * Get rozmiar
     *
     * @return \AppBundle\Entity\rozmiary
     */
    public function getRozmiar()
    {
        return $this->rozmiar;
    }
}
