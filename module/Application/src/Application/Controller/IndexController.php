<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $log = $this->getServiceLocator()->get('debugLog');
        
        //$erreur = new Erreur();
         $test = "hghjgjhg";
         $tabTest = array('Indice 1' => 
             array('clé 1' => 'Valeur 1'),
             array('clé 3' => 'Valeur 2'),
             array('clé 3' => 'Valeur 3'),
         );
//         var_dump($test);
        ini_set('max_execution_time',120);
        $log->info('Autre moyen d\'implémenter FirePHP !');
        $log->info("\$test: $test");
        $log->info('$tabTest',$tabTest);
//        $log->debug('Infos débug');
        return new ViewModel();
    }
}
