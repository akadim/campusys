<?php

namespace campusys\PedagogieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Campus
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="campusys\PedagogieBundle\Entity\CampusRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Campus
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
     * @ORM\Column(name="address", type="string", length=255)
     * @Assert\NotBlank(message="Le champs 'adresse' est requis")
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="slogan", type="string", length=255)
     * @Assert\NotBlank(message="Le champs 'slogan' est requis")
     * 
     */
    private $slogan;

    
    /**
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;
    
    
    /**
     * @Assert\File(
     *         maxSize=6000000,
     *         mimeTypes = {"image/gif", "image/jpeg", "image/pjpeg", "image/png"},
     *         mimeTypesMessage = "Les fichiers importés ne sont pas des images",
     *         notFoundMessage = "L'image est inexistant"
     *    )
     */    
    public $file;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date")
     * @Assert\NotBlank(message="Le champs 'date de création' est requis")
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="deanName", type="string", length=255)
     * @Assert\NotBlank(message="Le champs 'nom de doyen' est requis")
     */
    private $deanName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     *@ORM\ManyToOne(targetEntity="University", inversedBy="campuses")
     *@ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    private $university;

    /**
     *@ORM\OneToMany(targetEntity="Filiere", mappedBy="campus", fetch="EAGER", cascade={"persist", "remove"})
     */
    private $filieres;
    
    public function __construct(){
        $this->filieres = new ArrayCollection();
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
     * @return Campus
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
     * @return Campus
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
     * Set slogan
     *
     * @param string $slogan
     * @return Campus
     */
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;
    
        return $this;
    }

    /**
     * Get slogan
     *
     * @return string 
     */
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Campus
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
     * Set created
     *
     * @param \DateTime $created
     * @return Campus
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set deanName
     *
     * @param string $deanName
     * @return Campus
     */
    public function setDeanName($deanName)
    {
        $this->deanName = $deanName;
    
        return $this;
    }

    /**
     * Get deanName
     *
     * @return string 
     */
    public function getDeanName()
    {
        return $this->deanName;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Campus
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
    
    public function getLogo()
    {
        return $this->logo;
    }
    
    public function setLogo($logo){
        $this->logo = $logo;
    }
    
    public function getUniversity(){
        return $this->university;
    }
    
    public function setUniversity($university){
        $this->university = $university;
    }
    
    public function getFilieres(){
        return $this->filieres;
    }
    
    public function setFilieres($filieres){
        $this->filieres = $filieres;
    }
    /**
     *  @ORM\PrePersist
     *  @ORM\PreFlush
     */
    public function preUpload() {
        if($this->file)
           $this->logo = $this->file->getClientOriginalName();
    }
    
    /**
     * @ORM\PostPersist
     * @ORM\PostUpdate
     */
    public function upload(){
        if(null === $this->file)
            return null;
        
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        $this->logo = $this->file->getClientOriginalName();
        $this->file = null;
    }
    
    public function getAbsolutePath(){
       return null === $this->logo ? null : $this->getUploadRootDir().'/'.$this->logo;     
    }
    
    public function getWebPath() {
        return null === $this->logo ? null : $this->getUploadDir().'/'.$this->logo;
    }
    
    public function getUploadRootDir() {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    
    public function getUploadDir() {
        return 'uploads/campuses';
    }
    
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()  {
        $file = $this->getAbsolutePath();
        unlink($file);
    }
    
    public function set($column, $value){
        switch($column){
            case "name": $this->setName($value);break;
            case "address": $this->setAddress($value);break;
            case "slogan": $this->setSlogan($value);break;
            case "deanName": $this->setPresidentName($value);break;
        }
    }
}
