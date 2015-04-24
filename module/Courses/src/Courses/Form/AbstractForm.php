<?php
namespace Courses\Form;

use Zend\Form\Form;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;

class AbstractForm 
    extends Form
    implements EventManagerAwareInterface
{
    protected $events;
    
    public function setEventManager(EventManagerInterface $eventManager){
        $this->events = $eventManager;
    }
    
    public function getEventManager(){
        if(! $this->events ){
            $this->setEventManager(new EventManager(__CLASS__));
        }
        return $this->events;
    }
    

    
    public function __construct($name)
    {
        $events = $this->getEventManager()->trigger(__FUNCTION__,$this);
        parent::__construct($name);
    }
}

?>