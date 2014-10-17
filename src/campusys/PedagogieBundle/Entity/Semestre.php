<?php

namespace campusys\PedagogieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Semestre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="campusys\PedagogieBundle\Entity\SemestreRepository")
 */
class Semestre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="integer")
     * @Assert\NotBlank(message="Le champs 'nom' est requis")
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date")
     * @Assert\NotBlank(message="Le champs 'date début' est requis")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date")
     * @Assert\NotBlank(message="Le champs 'date fin' est requis")
     */
    private $dateFin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     *@ORM\OneToMany(targetEntity="Module", mappedBy="semestre", fetch="EAGER", cascade={"persist", "remove"})
     */
    private $modules;
    
    public function __construct() {
        $this->modules = new ArrayCollection();
    }

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
     * Set code
     *
     * @param integer $code
     * @return Semestre
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Semestre
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    
        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Semestre
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    
        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Semestre
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }
    
    public function getModules(){
        return $this->modules;
    }
    
    public function setModules($modules){
        $this->modules = $modules;
    }
}
