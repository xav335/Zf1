<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

//debug via firebug
require __DIR__ .'/../../vendor/firephp/firephp-core/lib/FirePHPCore/FirePHP.class.php';

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig(){
        return array(
          'factories' => array(
            'debuglog' => function($sm){
                $logger = new \Zend\Log\Logger();
                if (getenv('APPLICATION_ENV') == 'development') {
                   
                    $writer = new \Zend\Log\Writer\Stream(__DIR__. '/../../logs/debug.log');
                } else {
                    $writer = new \Zend\Log\Writer\FirePhp();
                }
               
                $logger->addWriter($writer);
                return $logger;
            }
          )  
        );
    }
}
