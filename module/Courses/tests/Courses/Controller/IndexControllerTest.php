<?php
namespace Courses\Controller;


use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class RoutingConfigurationTest extends AbstractHttpControllerTestCase
{
    public function setUp(){
        $this->setApplicationConfig(include __DIR__ .'/../../../../../config/application.config.php');
        parent::setUp();
    }
    
    public function testHomeRouteEstDispatchee(){
        $this->dispatch('/courses');
        
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Courses');
        $this->assertActionName('index');
        $this->assertMatchedRouteName('Courses');
        $this->assertControllerClass('IndexController');
        $this->assertControllerName('Courses\Controller\Index');
    
    }
    
    public function testCourseAddEstDispatchee(){
        $this->dispatch('/courses/add');
    
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Courses');
        $this->assertActionName('add');
        $this->assertMatchedRouteName('courses/add');
        $this->assertControllerClass('IndexController');
        $this->assertControllerName('Courses\Controller\Index');
    
    }
    
    public function testCourseDeleteEstPASDispatchee(){
        $this->dispatch('/courses/delete');
    
        $this->assertResponseStatusCode(404);
    
    }
    
}

?>