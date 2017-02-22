<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * rozmiary
 *
 * @ORM\Table(name="rozmiary")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\rozmiaryRepository")
 */
class rozmiary
{

      /**
      * @ORM\OneToMany(targetEntity="buty", mappedBy="rozmiar")
      */
     private $buty;

     public function __construct()
     {
         $this->buty = new ArrayCollection();
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
     * @ORM\Column(name="rozmiar", type="string", length=255)
     */
    private $rozmiar;


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
     * Set rozmiar
     *
     * @param string $rozmiar
     *
     * @return rozmiary
     */
    public function setRozmiar($rozmiar)
    {
        $this->rozmiar = $rozmiar;

        return $this;
    }

    /**
     * Get rozmiar
     *
     * @return string
     */
    public function getRozmiar()
    {
        return $this->rozmiar;
    }

    public function __toString()
    {
      return (string) $this->getRozmiar();
    }

    /**
     * Add buty
     *
     * @param \AppBundle\Entity\buty $buty
     *
     * @return rozmiary
     */
    public function addButy(\AppBundle\Entity\buty $buty)
    {
        $this->buty[] = $buty;

        return $this;
    }

    /**
     * Remove buty
     *
     * @param \AppBundle\Entity\buty $buty
     */
    public function removeButy(\AppBundle\Entity\buty $buty)
    {
        $this->buty->removeElement($buty);
    }

    /**
     * Get buty
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getButy()
    {
        return $this->buty;
    }
}
