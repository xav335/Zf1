<?php
namespace Courses\Model\Service;

use Courses\Model\Entity\EventEntity;
/**
 * Service d'échange avec les couches de persistence des evenements
 * @author javier
 *
 */
class EventService
{
    protected $persistMean;
    
    /**
     * Défini le moyen de persistence
     * @param unknown $mean
     */
    public function setPersistMean($mean) {
       $this->persistMean = $mean ;
    }
    
    public function fetchAll() {
        return $this->persistMean->fetchAll();
    }
    
    public function saveEvent(EventEntity $event){
        $data = $event->getArrayCopy();
        unset($data['inputFilter']);
        return $this->persistMean->saveEvent($data);
    }
    
    public function getEventById($id){
        return $this->persistMean->getEventById($id);
    }
}

?>