<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Courses for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Courses;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\I18n\Translator\Translator;
use Zend\Validator\AbstractValidator;
use Zend\EventManager\Event;
use Zend\EventManager\StaticEventManager;

class Module 
    implements AutoloaderProviderInterface,ConfigProviderInterface,
                ServiceProviderInterface
{
    protected $serviceManager;
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
		    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/' , __NAMESPACE__),
                ),
            ),
            
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig(){
        return include __DIR__ . '/config/service.config.php';
    }
    
    
    public function onBootstrap(MvcEvent $e){
        $app = $e->getApplication();
        $this->serviceManager = $app->getServiceManager();
        $events = $app->getEventManager();
        $sharedEvents = $events->getSharedManager();
        
        /**
         * Permet de changer le layout pour tous les controllers de ce module
         * @param ModuleManager $mngr
         */
        $sharedEvents->attach(__NAMESPACE__,'dispatch',function(Event $e){
            $ctrl = $e->getTarget();
            $ctrl->layout('layout/layoutFront');
        });        
        
        // Réagir à la création d'un formulaire
         $sharedEvents->attach('Courses\Form\AbstractForm','__construct',array($this,'onNewForm'));
    }

    public function onNewForm(Event $e){
        $defaultTranslator = $this->serviceManager->get('translator');
        $defaultLocale = $defaultTranslator->getLocale();
        $validatorTranslator = new Translator();
        $validatorTranslator->addTranslationFile('phpArray',
            __DIR__."/language/zendframework/$defaultLocale/Zend_Validate.php");
        AbstractValidator::setDefaultTranslator(new \Zend\Mvc\I18n\Translator($validatorTranslator));
        
    }
}
