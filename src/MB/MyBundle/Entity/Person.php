<?php

namespace MB\MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="MB\MyBundle\Repository\PersonRepository")
 */
class Person
{
    /**
     *
     * @ORM\OneToMany(targetEntity="OfficePresent", mappedBy="persons")
     *
     */

    private $biuros;
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
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="text")
     */
    private $image;


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
     * @return Person
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
     * Set surname
     *
     * @param string $surname
     * @return Person
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Person
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
     * Set position
     *
     * @param string $position
     * @return Person
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Person
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
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
     * @return Person
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
    public function __toString() {

        return (string) $this->name;
    }
}
