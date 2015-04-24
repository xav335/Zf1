<?php
namespace Courses\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Courses\Model\Service\EventService;
use Courses\Form\EventForm;
use Courses\Model\Entity\EventEntity;

/**
 * CourseController
 *
 * @author
 *
 * @version
 *
 */
class CourseController extends AbstractActionController
{
    protected $eventService;
    
    public function __construct(EventService $eventService){
        $this->eventService = $eventService;
    }
    
    public function listAction()
    {
        $evenements = $this->eventService->fetchAll();
        return new ViewModel(array('evenements' => $evenements));
    }
    
    public function addAction()
    {
        $form = new EventForm();
        $form->setAttribute('action', $this->url()->fromRoute('home/courses/ajouter'))            
                ->get('btnEnvoi')->setAttribute('value', 'Ajouter');
        
//         $log = $this->getServiceLocator()->get('debugLog');
//         $log->info('form' , $form);
        
        // Formulaire soumis ?
        $request = $this->getRequest();
        if( $request->isPost() ){
            $event = new EventEntity();
            $form->setInputFilter($event->getInputFilter());
            $form->setData($request->getPost());
            
            // Valide ?
            if($form->isValid()){
                $event->exchangeArray($form->getData());
                $this->eventService->saveEvent($event);
                // Redirection
                return $this->redirect()->toRoute('home/courses');
            }        
        }
        
        return new ViewModel( array('formulaire' => $form) );
    }
    
    public function deleteAction()
    {
        // TODO Auto-generated CourseController::indexAction() default action
        return new ViewModel();
    }
    
    public function seeAction()
    {
        // TODO Auto-generated CourseController::indexAction() default action
        return new ViewModel();
    }
    
    public function searchAction()
    {
        // TODO Auto-generated CourseController::indexAction() default action
        return new ViewModel();
    }
    
    public function editAction()
    {
        $id = (int)$this->params()->fromRoute('id',0);
        if(!$id){
            return $this->redirect()->toRoute('home/courses/ajouter');
        }
        
        try{
            $event = $this->eventService->getEvent($id);
        }catch(\Exception $e){
            return $this->redirect()->toRoute('home/courses');
        }
        
        $form = new EventForm();
        $form->bind($event);
        $form->get('btnEnvoi')->setValue('Modifier');
        
        // Formulaire soumis ?
        $request = $this->getRequest();
        if( $request->isPost() ){
            $form->setInputFilter($event->getInputFilter());
            $form->setData($request->getPost());
            // Valide ?
            if($form->isValid()){
                $this->eventService->saveEvent($event);
                // Redirection
                return $this->redirect()->toRoute('home/courses');
            }        
        }
        
        return new ViewModel( array('formulaire' => $form, 'id' => $event->id) );
    }
    
    
}