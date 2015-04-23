<?php
namespace Courses\Model\Service;

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
}

?>