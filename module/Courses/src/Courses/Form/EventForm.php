<?php
namespace Courses\Form;

//use Zend\EventManager\EventManagerInterface;
class EventForm extends AbstractForm
{

    
    
    public function __construct(){
        parent::__construct('event-form');
        $this->setAttribute("method", "post");
        
        $this->add(array(
            'type' => 'Hidden',
            'name' => 'id',
        ));
        
        $this->add(array(
            'type' => 'Text',
            'name' => 'name',
            'options' => array(
                'label' => 'Nom :'
            ),
        ));
        
        $this->add(array(
            'type' => 'Text',
            'name' => 'location',
            'attributes' => array(
                
            ),
            'options' => array(
                'label' => 'Lieu :'
            ),
        ));
        
        $this->add(array(
            'type' => 'Textarea',
            'name' => 'description',
            'attributes' => array(
                'rows' => 5,
                'cols' => 50,
            ),
            'options' => array(
                'label' => 'Description :'
            ),
        ));
        
        $this->add(array(
            'type' => 'Date',
            'name' => 'date',
            'options' => array(
                'label' => 'Date :',
                //'format' => 'd/m/Y',
            ),
        ));
        
        $this->add(array(
            'type' => 'Submit',
            'name' => 'btnEnvoi',
            'attributes' => array(
                'value' => 'OK',
            ),
        ));
        
    }
}

?>