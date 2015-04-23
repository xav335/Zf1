<?php
namespace Courses\Model\Table;

use Zend\Db\TableGateway\TableGateway;
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
}

?>