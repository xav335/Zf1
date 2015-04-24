<?php
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Courses\Model\Entity\EventEntity;
use Courses\Model\Table\EventTable;
use Courses\Model\Service\EventService;

return array(
    'factories' => array(
        'EventTableGateway' => function($sm){
            $table ='vwevents';
            $adapter = $sm->get('Zend\Db\Adapter\Adapter') ;
            $resultSet = new ResultSet();
            $resultSet->setArrayObjectPrototype(new EventEntity());
            $tableGateway = new TableGateway($table, $adapter,null,$resultSet);
            return $tableGateway;
        },
        'Courses\Model\Table\EventTable' => function($sm){
            $gateway = $sm->get('EventTableGateway');
            $table = new EventTable($gateway);
            return $table;
        },
        'EventService' => function($sm){
            $table = $sm->get('Courses\Model\Table\EventTable');
            $service = new EventService();
            $service->setPersistMean($table);
            return $service;
        }
        
    ),
    
);