<?php
namespace Courses\Model\Service;
use Courses\Model\Entity\EventEntity;

/**
 * Services d'échanges avec les couches de persistence des événements
 * @author Administrateur
 *
 */



class EventService //implements EventServiceInterface
{
    protected $persistMean;
    
    /**
     * Définit le moyen de persistence 
     * @param mixed $mean
     */
    public function setPersistMean($mean){
        $this->persistMean = $mean;
    } 
    
    /**
     * Obtient tous les �v�nements
     */
    public function fetchAll(){
        return $this->persistMean->fetchAll();
    }
    
    /**
     * Persiste un événement
     */
    public function saveEvent(EventEntity $event){
        $data = $event->getArrayCopy();
        unset($data['inputFilter']);
        
        $this->persistMean->saveEvent($data);
    }
    
    public function getEvent($id){
        $data = $this->persistMean->getEvent($id);
        //$event = new EventEntity($data);
        return $data;    
    }
    
    
    
}

?>