<?php

namespace AppBundle\Entity\datalist;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * _druglike
 *
 * @ORM\Table(name="datalist_druglike")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\datalist\_druglikeRepository")
 */
class _druglike
{

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\datalist\_druglike_category", inversedBy="druglike")
     * @ORM\JoinColumn(name="druglikeCategory", referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\substances", mappedBy="druglike")
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
     * @var string
     *
     * @ORM\Column(name="CAS", type="string", length=255)
     */
    private $cAS;




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
     * @return _druglike
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
     * Set cAS
     *
     * @param string $cAS
     *
     * @return _druglike
     */
    public function setCAS($cAS)
    {
        $this->cAS = $cAS;

        return $this;
    }

    /**
     * Get cAS
     *
     * @return string
     */
    public function getCAS()
    {
        return $this->cAS;
    }

    /**
     * Set druglikeCategory
     *
     * @param integer $druglikeCategory
     *
     * @return _druglike
     */
    public function setDruglikeCategory($druglikeCategory)
    {
        $this->druglikeCategory = $druglikeCategory;

        return $this;
    }

    /**
     * Get druglikeCategory
     *
     * @return int
     */
    public function getDruglikeCategory()
    {
        return $this->druglikeCategory;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\datalists\_druglike_category $category
     *
     * @return _druglike
     */
    public function setCategory(\AppBundle\Entity\datalist\_druglike_category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\datalists\_druglike_category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add druglike
     *
     * @param \AppBundle\Entity\substances $druglike
     *
     * @return _druglike
     */
    public function addDruglike(\AppBundle\Entity\substances $druglike)
    {
        $this->druglikes[] = $druglike;

        return $this;
    }

    /**
     * Remove druglike
     *
     * @param \AppBundle\Entity\substances $druglike
     */
    public function removeDruglike(\AppBundle\Entity\substances $druglike)
    {
        $this->druglikes->removeElement($druglike);
    }

    /**
     * Get druglikes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDruglikes()
    {
        return $this->druglikes;
    }

    /**
     * Add substance
     *
     * @param \AppBundle\Entity\substances $substance
     *
     * @return _druglike
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
