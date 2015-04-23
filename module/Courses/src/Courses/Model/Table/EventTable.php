<?php
namespace Courses\Model\Table;

use Zend\Db\TableGateway\TableGateway;
use Courses\Model\Entity\EventEntity;
/**
 * represente la table ou les evenements seront stockés
 * @author javier
 *
 */
class EventTable
{
    protected $gateway;
    
    public function __construct(TableGateway $gtw){
        $this->gateway = $gtw;
    }
    
    public function fetchAll(){
        $results = $this->gateway->select();
        return $results;
    }
    
    public function saveEvent($data){
        $id = (int) $data['id'];
        unset($data['id']);
       
        if ($data['date'] instanceof \DateTime){
            $data['date'] = $data['date']->format('Y-m-d');
        }
        if (0 === $id){
           
            $this->gateway->insert($data);
            return $this->gateway->lastInsertValue;
        } else {
            //TODO : gerer si l'evenement id peut être dasn la table
            $this->gateway->update($data, array('id' => $id));
            return $id;
        }    
    }
}

?>