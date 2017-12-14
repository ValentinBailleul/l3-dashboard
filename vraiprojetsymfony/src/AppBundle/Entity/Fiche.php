<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Fiche
 *
 * @ORM\Table(name="fiche")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FicheRepository")
 */
class Fiche
{

    /**
     * @ORM\ManyToOne(targetEntity="projet", inversedBy="fiche")
     * @ORM\JoinColumn(name="projet_id", referencedColumnName="id")
     */
    private $projet;

    /**
     * @return mixed
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * @param mixed $projet
     */
    public function setProjet($projet)
    {
        $this->projet = $projet;
    }

    /**
     * @return mixed
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @param mixed $manager
     */
    public function setManager($manager)
    {
        $this->manager = $manager;
    }


    /**
     * @ORM\ManyToOne(targetEntity="manager", inversedBy="fiche")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id")
     */
    private $manager;


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
     * @ORM\Column(name="projectName", type="string", length=255)
     */
    private $projectName;

    /**
     * @return \DateTime
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    public function __toString()
    {
        return $this->firstName.'';
    }

    /**
     * @param \DateTime $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ficheDate", type="datetime")
     */

    private $createdBy;

    /**
     * @var string
     *
     * @ORM\Column(name="createBy", type="string")
     */

    private $ficheDate;

    /**
     * @var float
     *
     * @ORM\Column(name="nbDayDone", type="float")
     */
    private $nbDayDone;

    /**
     * @var float
     *
     * @ORM\Column(name="nbDateSold", type="float")
     */
    private $nbDateSold;

    /**
     * @var float
     *
     * @ORM\Column(name="progression", type="float")
     */
    private $progression;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;


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
     * Set projectName
     *
     * @param string $projectName
     *
     * @return Fiche
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * Get projectName
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * Set ficheDate
     *
     * @param \DateTime $ficheDate
     *
     * @return Fiche
     */
    public function setFicheDate($ficheDate)
    {
        $this->ficheDate = $ficheDate;

        return $this;
    }

    /**
     * Get ficheDate
     *
     * @return \DateTime
     */
    public function getFicheDate()
    {
        return $this->ficheDate;
    }

    /**
     * Set nbDayDone
     *
     * @param float $nbDayDone
     *
     * @return Fiche
     */
    public function setNbDayDone($nbDayDone)
    {
        $this->nbDayDone = $nbDayDone;

        return $this;
    }

    /**
     * Get nbDayDone
     *
     * @return float
     */
    public function getNbDayDone()
    {
        return $this->nbDayDone;
    }

    /**
     * Set nbDateSold
     *
     * @param float $nbDateSold
     *
     * @return Fiche
     */
    public function setNbDateSold($nbDateSold)
    {
        $this->nbDateSold = $nbDateSold;

        return $this;
    }

    /**
     * Get nbDateSold
     *
     * @return float
     */
    public function getNbDateSold()
    {
        return $this->nbDateSold;
    }

    /**
     * Set progression
     *
     * @param float $progression
     *
     * @return Fiche
     */
    public function setProgression($progression)
    {
        $this->progression = $progression;

        return $this;
    }

    /**
     * Get progression
     *
     * @return float
     */
    public function getProgression()
    {
        return $this->progression;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Fiche
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}
