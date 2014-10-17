<?php

namespace campusys\PedagogieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="campusys\PedagogieBundle\Entity\CoursRepository")
 */
class Cours
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
     *@ORM\ManyToOne(targetEntity="Module", inversedBy="modules")
     *@ORM\JoinColumn(name="module_id", referencedColumnName="id")
     *@Assert\NotBlank(message="Le champs 'module' est requis")
     */
    private $module;

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
     * @return Cours
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
     * @return Cours
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
     * @return Cours
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
     * @return Cours
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
    
    public function getModule()
    {
        return $this->module;
    }
    
    public function setModule($module)
    {
        $this->module = $module;
    }
    
    public function set($column, $value){
        switch($column){
            case "name": $this->setName($value);break;
        }
    }
}
