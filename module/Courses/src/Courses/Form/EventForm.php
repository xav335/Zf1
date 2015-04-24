<?php
namespace Courses\Form;

use Zend\Form\Form;


class EventForm extends Form
{
    public function  __construct(){
        parent::__construct('event-form');
        $this->setAttribute('method', 'post');
        
        $this->add(array(
                'type' => 'hidden',
                'name' => 'id',
        ));
        $this->add(array(
            'type' => 'text',
            'name' => 'name',
            'attributs' => array(
        
            ),
            'options' => array(
                'label' => 'nom',
            ),
        ));
        $this->add(array(
            'type' => 'text',
            'name' => 'location',
            'attributs' => array(
                
            ),
            'options' => array(
                'label' => 'lieu',
            ),
        ));
        $this->add(array(
            'type' => 'textarea',
            'name' => 'description',
            'attributs' => array(
        
            ),
            'options' => array(
                'label' => 'description',
            ),
        ));
        $this->add(array(
            'type' => 'date',
            'name' => 'date',
            'attributs' => array(
        
            ),
            'options' => array(
                'label' => 'date',
            ),
        ));
       $this->add(array(
             'name' => 'btnEnvoi',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
             ),
         ));
         
    }
    
}

?>