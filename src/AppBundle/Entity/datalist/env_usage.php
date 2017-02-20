<?php

namespace AppBundle\Entity\datalist;

use Doctrine\ORM\Mapping as ORM;

/**
 * env_usage
 *
 * @ORM\Table(name="datalistenv_usage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\datalist\env_usageRepository")
 */
class env_usage
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
     * @var float
     *
     * @ORM\Column(name="rateperkilo", type="float")
     */
    private $rateperkilo;


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
     * @return env_usage
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
     * Set rateperkilo
     *
     * @param float $rateperkilo
     *
     * @return env_usage
     */
    public function setRateperkilo($rateperkilo)
    {
        $this->rateperkilo = $rateperkilo;

        return $this;
    }

    /**
     * Get rateperkilo
     *
     * @return float
     */
    public function getRateperkilo()
    {
        return $this->rateperkilo;
    }
}

