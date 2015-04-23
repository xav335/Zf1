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
use Zend\Log\Logger;

// debug via firebug
// require_once __DIR__ .'/../../../../../vendor/firephp/firephp-core/lib/FirePHPCore/fb.php';

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $log = $this->getServiceLocator()->get('debuglog');
        if ($log instanceof Logger)
            $log->info('Autre moyen d\'implementer firebug');
         //$log->debug('pouet');
        return new ViewModel();
    }
}
