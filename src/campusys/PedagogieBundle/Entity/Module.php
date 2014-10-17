<?php

namespace campusys\PedagogieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Module
 *
 * @ORM\Table(name="module")
 * @ORM\Entity(repositoryClass="campusys\PedagogieBundle\Entity\ModuleRepository")
 */
class Module
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(message="Le champs 'nom' est requis")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="numberOfHour", type="integer")
     * @Assert\NotBlank(message="Le champs 'masse horaire' est requis")
     */
    private $numberOfHour;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    
    /**
     *@ORM\ManyToOne(targetEntity="Filiere", inversedBy="modules") 
     *@ORM\JoinColumn(name="filiere_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Le champs 'filière' est requis")
     */
    private $filiere;
    
    /**
     *@ORM\ManyToOne(targetEntity="Semestre", inversedBy="modules") 
     *@ORM\JoinColumn(name="filiere_id", referencedColumnName="id")
     *@Assert\NotBlank(message="Le champs 'Semestre' est requis")
     */
    private $semestre;

    
    /**
     *@ORM\OneToMany(targetEntity="Cours", mappedBy="module", fetch="EAGER", cascade={"persist", "remove"})
     */
    private $courses;
    
    public function __construct() {
        $this->courses = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Module
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
     * Set description
     *
     * @param string $description
     * @return Module
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set numberOfHour
     *
     * @param integer $numberOfHour
     * @return Module
     */
    public function setNumberOfHour($numberOfHour)
    {
        $this->numberOfHour = $numberOfHour;
    
        return $this;
    }

    /**
     * Get numberOfHour
     *
     * @return integer 
     */
    public function getNumberOfHour()
    {
        return $this->numberOfHour;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Module
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
    
    public function getFiliere()
    {
        return $this->filiere;
    }
    
    public function setFiliere($filiere){
        $this->filiere = $filiere;
    }
    
    public function getSemestre()
    {
        return $this->semestre;
    }
    
    public function setSemestre($semestre){
        $this->semestre = $semestre;
    }
    
    public function getCourses()
    {
        return $this->courses;
    }
    
    public function setCourses($courses){
        $this->courses = $courses;
    }
    
    public function set($column, $value){
        switch($column){
            case "name": $this->setName($value);break;
        }
    }
}
