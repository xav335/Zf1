<?php
namespace CoursesTest\Controller;



use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ConfigurationRoutesTest extends AbstractHttpControllerTestCase
{
    public function setUp(){
        $this->setApplicationConfig(include __DIR__ .'/../../../../../config/application.config.php');
        parent::setUp();
    }
    
    public function testHomeRouteEstDispatchee(){
        $this->dispatch('/');

        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Courses');
        $this->assertMatchedRouteName('home');
        $this->assertControllerClass('IndexController');
        $this->assertActionName('index');
        $this->assertControllerName('Courses\Controller\Index');
        
    }


    public function testCoursesRouteEstDispatchee(){
        $this->dispatch('courses');
    
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Courses');
        $this->assertMatchedRouteName('home/courses');
        $this->assertControllerClass('CourseController');
        $this->assertControllerName('Courses\Controller\Course');
        $this->assertActionName('list');
    }

    public function testCoursesAjouterRouteEstDispatchee(){
        $this->dispatch('/courses/ajouter');
    
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Courses');
        $this->assertMatchedRouteName('home/courses/ajouter');
        $this->assertControllerClass('CourseController');
        $this->assertControllerName('Courses\Controller\Course');
        $this->assertActionName('add');
    }
    
    public function testCoursesModifierRouteEstDispatchee(){
        $this->dispatch('/courses/modifier/1');
    
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Courses');
        $this->assertMatchedRouteName('home/courses/modifier');
        $this->assertControllerClass('CourseController');
        $this->assertControllerName('Courses\Controller\Course');
        $this->assertActionName('edit');
    }    

    public function testCoursesModifierRouteIncompleteNEstPasDispatchee(){
        $this->dispatch('/courses/modifier');
    
        $this->assertResponseStatusCode(404);
    }
    

    public function testCoursesSupprimerRouteEstDispatchee(){
        $this->dispatch('/courses/supprimer/1');
    
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Courses');
        $this->assertMatchedRouteName('home/courses/supprimer');
        $this->assertControllerClass('CourseController');
        $this->assertControllerName('Courses\Controller\Course');
        $this->assertActionName('delete');
    }
    
    public function testCoursesSupprimerRouteIncompleteNEstPasDispatchee(){
        $this->dispatch('/courses/supprimer');
    
        $this->assertResponseStatusCode(404);
    }

    public function testCoursesSupprimerRouteIncoherenteNEstPasDispatchee(){
        $this->dispatch('/courses/supprimer/toto');
    
        $this->assertResponseStatusCode(404);
    }    
    
    public function testCoursesVoirRouteEstDispatchee(){
        $this->dispatch('/courses/voir/1');
    
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Courses');
        $this->assertMatchedRouteName('home/courses/voir');
        $this->assertControllerClass('CourseController');
        $this->assertControllerName('Courses\Controller\Course');
        $this->assertActionName('see');
    }
    
    public function testCoursesVoirRouteIncompleteNEstPasDispatchee(){
        $this->dispatch('home/courses/voir');
    
        $this->assertResponseStatusCode(404);
    }
    
    
}

?>