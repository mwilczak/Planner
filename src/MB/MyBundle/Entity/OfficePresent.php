<?php

namespace MB\MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OfficePresent
 *
 * @ORM\Table(name="office_present")
 * @ORM\Entity(repositoryClass="MB\MyBundle\Repository\OfficePresentRepository")
 */
class OfficePresent
{
    /**
     *
     *
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="biuros")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    private $persons;
    /**
     *
     * @ORM\ManyToOne(targetEntity="Biuro", inversedBy="bulding")
     * @ORM\JoinColumn(name="biuro_id", referencedColumnName="id")
     */
    private $presents;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;


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
     * Set date
     *
     * @param \DateTime $date
     * @return OfficePresent
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set persons
     *
     * @param \MB\MyBundle\Entity\Person $persons
     * @return OfficePresent
     */
    public function setPersons(\MB\MyBundle\Entity\Person $persons = null)
    {
        $this->persons = $persons;

        return $this;
    }

    /**
     * Get persons
     *
     * @return \MB\MyBundle\Entity\Person 
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Set presents
     *
     * @param \MB\MyBundle\Entity\Biuro $presents
     * @return OfficePresent
     */
    public function setPresents(\MB\MyBundle\Entity\Biuro $presents = null)
    {
        $this->presents = $presents;

        return $this;
    }

    /**
     * Get presents
     *
     * @return \MB\MyBundle\Entity\Biuro 
     */
    public function getPresents()
    {
        return $this->presents;
    }
}
