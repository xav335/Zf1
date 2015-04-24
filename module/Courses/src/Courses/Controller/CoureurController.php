<?php
namespace Courses\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * CoureurController
 *
 * @author
 *
 * @version
 *
 */
class CoureurController extends AbstractActionController
{

    /**
     * The default action - show the home page
     */
    public function indexAction()
    {
        // TODO Auto-generated CoureurController::indexAction() default action
        return new ViewModel(array('message'  => 'Jean Dupont  2') );
    }
}