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
                //APPLICATION_ENV  est definie dans le host d'apache.
                if (getenv('APPLICATION_ENV') == 'development') {
                    $firePhp = \FirePHP::getInstance(true);
                    $firePhp->setOption('maxObjectDepth', 5);
                    $writer = new \Zend\Log\Writer\FirePhp(new \Zend\Log\Writer\FirePhp\FirePhpBridge($firePhp));
                } else {
                    $writer = new \Zend\Log\Writer\Stream(__DIR__. '/../../logs/debug.log');
                }
               
                $logger->addWriter($writer);
                return $logger;
            }
          )  
        );
    }
}
