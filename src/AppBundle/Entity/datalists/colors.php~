<?php


namespace AppBundle\Entity\datalists;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * colors
 *
 * @ORM\Table(name="colors")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\colorsRepository")
 */
class colors
{
        /**
        * @ORM\OneToMany(targetEntity="AppBundle\Entity\buty", mappedBy="kolor")
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
     * @ORM\Column(name="kolor", type="string", length=255)
     */
    private $kolor;


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
     * Set kolor
     *
     * @param string $kolor
     *
     * @return colors
     */
    public function setKolor($kolor)
    {
        $this->kolor = $kolor;

        return $this;
    }

    /**
     * Get kolor
     *
     * @return string
     */
    public function getKolor()
    {
        return $this->kolor;
    }

    /**
     * Add buty
     *
     * @param \AppBundle\Entity\buty $buty
     *
     * @return colors
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


    public function __toString()
    {
      return (string) $this->getKolor();
    }

}
