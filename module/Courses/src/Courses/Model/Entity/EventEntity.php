<?php
namespace Courses\Model\Entity;

class EventEntity
{
    public $id;
    public $name;
    public $location;
    public $date;
    public $description;
    
    public function __construct(array $options = null){
        if (null !== $options){
            $this->exchangeArray($options);        
        }
    }
    
    public function exchangeArray(array $data){
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->name = isset($data['name']) ? $data['name'] : null;
        $this->location = isset($data['location']) ? $data['location'] : null;
        $this->date = isset($data['date']) ? new \DateTime($data['date']) : null;
        $this->description = isset($data['description']) ? $data['description'] : null;
    }
    
    /**
     * @return multitype:
     */
    public function getArrayCopy(){
        return get_object_vars($this);
    }
}

?>