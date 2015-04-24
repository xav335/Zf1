<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Courses for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Courses\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Courses\Model\Service\EventService;
use Courses\Form\EventForm;
use Courses\Model\Entity\EventEntity;

class IndexController extends AbstractActionController
{
    protected $eventService;
    
    public function __construct(EventService $eventService){
        $this->eventService = $eventService;
    }
    
    public function listAction()
    {
        return new ViewModel(array('message' => 'Course default'));
    }
    
    public function indexAction()
    {

        $evenements = $this->eventService->fetchAll();
        return new ViewModel(array('evenements' => $evenements));
        //return new ViewModel();
    }

    public function addAction()
    {
        $form = new EventForm();
        $form->setAttribute('action', $this->url()->fromRoute('courses/add'));
        $form->get('btnEnvoi')->setAttribute('value', 'ajouter');
        
        //$log = $this->getServiceLocator()->get('debuglog');
        //if ($log instanceof Logger);
        //$log->info('form', $form);
        
        
        //Formulaire soumit ?
        $request = $this->getRequest();
        if ($request->isPost()){
            $event = new EventEntity();
            $form->setInputFilter($event->getInputFilter());
            $form->setData($request->getPost());
            //valide ?
            if($form->isValid()){
                $event->exchangeArray($form->getData());
                $rtn = $this->eventService->saveEvent($event);
                //redirection
                return $this->redirect()->toRoute('courses');
            }
        }
            
        return new ViewModel(array('message' => 'Ajouter une course', 'formulaire' => $form));
    }
    
    public function modifyAction()
    {
        $id = $this->params()->fromRoute('id');
        $form = new EventForm();
        $form->setAttribute('action', $this->url()->fromRoute('courses/modify',array('id' => $id)));
        $form->get('btnEnvoi')->setAttribute('value', 'Modifier');
        
        $event = $this->eventService->getEventById($id);
        $form->bind($event);
        
        $request = $this->getRequest();
         if ($request->isPost()){
                $event = new EventEntity();
                $form->setInputFilter($event->getInputFilter());
                $form->setData($request->getPost());
                //valide ?
                if($form->isValid()){
                    $event->exchangeArray($form->getData());
                    $rtn = $this->eventService->saveEvent($event);
                    //redirection
                    return $this->redirect()->toRoute('courses');
                }
            }
        
        
        return new ViewModel(array('message' => 'Modifier une course', 'formulaire' => $form));
    }
    
    public function deleteAction()
    {
        return new ViewModel(array('message' => 'Supprimer une course'));
    }
}
