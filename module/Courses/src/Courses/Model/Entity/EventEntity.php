<?php
namespace Courses\Model\Entity;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilter;


class EventEntity implements InputFilterAwareInterface

{
    
    public $id;
    
    public $name;
    
    public $location;
    
    public $date;
    
    public $description;
    
    protected $inputFilter;
    
    public function __construct(array $options = null ){
        if(null !== $options){
            $this->exchangeArray($options);
        }
    }
    
    /**
     * Valorise les attrbuts de l'instance � partir des indices 
     * de $data
     * @param array $data
     */
    public function exchangeArray(array $data){
        $this->id = isset($data['id']) ? $data['id'] :  null ;
        $this->name = isset($data['name']) ? $data['name'] :  null ;
        $this->location = isset($data['location']) ? $data['location'] :  null ;
        $this->date = isset($data['date']) ? new \DateTime($data['date']) :  null ;
        $this->description = isset($data['description']) ? $data['description'] :  null ;
    }
    
    /**
     * Retourne l'instance sous forme d'un tableau assciatif 
     * @return array;
     */
    public function getArrayCopy(){
        return get_object_vars($this);
    }
    
    public function getInputFilter(){
        if(!$this->inputFilter){
            $if = new InputFilter();
            
            $if->add(array(
                'name' => 'id',
                'required' => true,
                'filters' => array(
                    'DevientEntier' => array('name' => 'Int'),
                )
            ));
            
            $if->add(array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StringTrim'),
                    array('name' =>'StripTags'),
                ),
                'validators' => array(
//                     new StringLength(array('min' => 3)),
                    array(
                        'name' => 'StringLength',
                        'options' => array('min' => 5,)
                    ),
                ),
            ));
            
            $if->add(array(
                'name' => 'date',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'Date',
                        'options' => array('format' => 'Y-m-d'),
                    ),
                ),
                'filters' => array( 
                    new \Zend\Filter\Callback(
                        array(
                            'callback' => function($date){
                                $dateMod = date_create_from_format('d/m/Y', $date );
                                if($dateMod instanceof \DateTime)
                                    return $dateMod->format('Y-m-d');
                                else   
                                    return $date;
                            }
                        )
                    ),

                ),
            ));
            
            $if->add(array(
                'name' => 'description',
                'required' => false,
                'filters' => array(
                    array('name' => 'StringTrim'),
                    array('name' =>'StripTags'),
                ),
            ));
            
            $if->add(array(
                'name' => 'location',
                'required' => true,
                'filters' => array(
                    array('name' => 'StringTrim'),
                    array('name' =>'StripTags'),
                ),
            ));
        
            $this->inputFilter = $if;
        }
        
            
        return $this->inputFilter;    
    }
    
    public function setInputFilter(InputFilterInterface $filter){
        throw new \Exception('Définition de l\'inputfilter impossible !');
    }
}

?>