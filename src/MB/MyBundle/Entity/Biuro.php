<?php

namespace MB\MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Biuro
 *
 * @ORM\Table(name="biuro")
 * @ORM\Entity(repositoryClass="MB\MyBundle\Repository\BiuroRepository")
 */
class Biuro
{
    /**
     *
     * @ORM\OneToMany(targetEntity="OfficePresent", mappedBy="presents")
     *
     */

    private $bulding;
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
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Biuro
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
     * Set address
     *
     * @param string $address
     * @return Biuro
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->biuros = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add biuros
     *
     * @param \MB\MyBundle\Entity\OfficePresent $biuros
     * @return Biuro
     */
    public function addBiuro(\MB\MyBundle\Entity\OfficePresent $biuros)
    {
        $this->biuros[] = $biuros;

        return $this;
    }

    /**
     * Remove biuros
     *
     * @param \MB\MyBundle\Entity\OfficePresent $biuros
     */
    public function removeBiuro(\MB\MyBundle\Entity\OfficePresent $biuros)
    {
        $this->biuros->removeElement($biuros);
    }

    /**
     * Get biuros
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBiuros()
    {
        return $this->biuros;
    }

    /**
     * Add bulding
     *
     * @param \MB\MyBundle\Entity\OfficePresent $bulding
     * @return Biuro
     */
    public function addBulding(\MB\MyBundle\Entity\OfficePresent $bulding)
    {
        $this->bulding[] = $bulding;

        return $this;
    }

    /**
     * Remove bulding
     *
     * @param \MB\MyBundle\Entity\OfficePresent $bulding
     */
    public function removeBulding(\MB\MyBundle\Entity\OfficePresent $bulding)
    {
        $this->bulding->removeElement($bulding);
    }

    /**
     * Get bulding
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBulding()
    {
        return $this->bulding;
    }
    public function __toString() {

        return (string) $this->name;
    }
}
