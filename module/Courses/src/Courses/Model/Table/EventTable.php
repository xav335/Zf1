<?php
namespace Courses\Model\Table;
/**
 * Repr�sente la table o� les �v�nements seront persist�s
 * @author Administrateur
 *
 */

use Zend\Db\TableGateway\TableGateway;


class EventTable
{
    protected $gateway;
    
    /**
     * 
     * @param TableGateway $gtw
     */
    public function __construct(TableGateway $gtw){
        $this->gateway = $gtw;
    }
    
    /**
     * Obtient tous les événements de la table
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function fetchAll(){
        $results = $this->gateway->select();
        return $results;
    }
    

    /**
     * Persiste un événement
     * 
     * @return int ID de l'enregistrement ajouté/mis à jour
     */
    public function saveEvent($data){
        
        $id = (int)$data['id'];
        unset($data['id']);
        
        // Transformation de la date pour mySQL
        if($data['date'] instanceof \DateTime){
            $data['date'] = $data['date']->format('Y-m-d');
        }
        
        if(0 === $id){
            $this->gateway->insert($data);
            return $this->gateway->lastInsertValue;
        }else{
            // @TODO : gérer si l'événement $id peut être trouvé dans la table 
            $this->gateway->update($data,array('id' => $id));
            return $id;
        }
    }
    
    public function getEvent($id){
        $id = (int)$id;

        $results = $this->gateway->select(array('id' => $id));
        $row = $results->current();
        
        if(!$row){
            throw new \Exception('Evénement introuvable');
        }
        
        return $row;
    }
}

?>