<?php

namespace AppBundle\Entity\datalist;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * _druglike_category
 *
 * @ORM\Table(name="datalist_druglike_category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\datalist\_druglike_categoryRepository")
 */
class _druglike_category
{
      /**
      * @ORM\OneToMany(targetEntity="AppBundle\Entity\datalist\_druglike", mappedBy="category")
      */
     private $druglike;

     public function __construct()
     {
         $this->druglike = new ArrayCollection();
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
     * @return _druglike_category
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
     * Add druglike
     *
     * @param \AppBundle\Entity\datalist\_druglike $druglike
     *
     * @return _druglike_category
     */
    public function addDruglike(\AppBundle\Entity\datalist\_druglike $druglike)
    {
        $this->druglike[] = $druglike;

        return $this;
    }

    /**
     * Remove druglike
     *
     * @param \AppBundle\Entity\datalist\_druglike $druglike
     */
    public function removeDruglike(\AppBundle\Entity\datalist\_druglike $druglike)
    {
        $this->druglike->removeElement($druglike);
    }

    /**
     * Get druglike
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDruglike()
    {
        return $this->druglike;
    }

    public function __toString()
    {
      return (string) $this->getName();
    }
}
