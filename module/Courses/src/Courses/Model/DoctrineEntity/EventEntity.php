<?php
namespace Courses\Model\DoctrineEntity;

use Doctrine\ORM\Mapping As ORM;
use Zend\Filter\Int;
use Zend\XmlRpc\Value\String;

/**
 * Evénements liés à la DB via Doctrine
 * @author Administrateur
 *
 * @ORM\Entity
 * @ORM\Table(name="events")
 *
 */
class EventEntity
{
    /**
     * @var Int
     * 
     * @ORM\Column(name="id",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;
    
    
    /**
     * @var string
     * 
     * @ORM\Column(name="name",type="string")
     * 
     */
    protected $name;
    
    /**
     * 
     * @var string
     * 
     * @ORM\Column(name="description",type="text")
     */
    protected $description;
    
    
    /**
     * @var String
     * 
     * @ORM\Column(name="location",type="string")
     */
    protected $location;
    
    
    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="rundate",type="date")
     */
    protected $date;
    
    

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
     *
     * @return EventEntity
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
     *
     * @return EventEntity
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
     * Set location
     *
     * @param string $location
     *
     * @return EventEntity
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return EventEntity
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
    
    public function __get($prop){
        return $this->$prop;
    }
    
    public function __set($prop,$val){
        $this->$prop = $val;
    
    }
    
    
}
