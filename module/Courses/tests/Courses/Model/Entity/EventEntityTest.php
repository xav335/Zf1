<?php
namespace CoursesTest\Model\Entity;

use Courses\Model\Entity\EventEntity;

class EventEntityTest extends \PHPUnit_Framework_TestCase
{
    public function testNewCreeUneInstanceVide(){
        $event = new EventEntity();
        
        $this->assertNull($event->id);
        $this->assertNull($event->name);
        $this->assertNull($event->location);
        $this->assertNull($event->description);
        $this->assertNull($event->date);
    }
    
    public function testPopulateValoriseLesAttributs() {
        $data = array(
            'id' => 5,
            'name' => 'un événement',
            'description' => 'super description',
            'date' => '2015-04-21',
            'location' => 'Toulouse'
        );
        
        $event = new EventEntity();
        $event->populate($data);
        
        $this->assertEquals($data['id'], $event->id);
        $this->assertEquals($data['name'], $event->name);
        $this->assertEquals($data['location'], $event->location);
        $this->assertEquals($data['description'], $event->description);
        $this->assertEquals(new \DateTime($data['date']), $event->date);
        $this->assertInstanceOf('\DateTime', $event->date);
        
    }
    
    public function testNewAvecOptionsCreeUneInstanceValotisees() {
        $data = array(
            'id' => 5,
            'name' => 'un événement',
            'description' => 'super description',
            'date' => '2015-04-21',
            'location' => 'Toulouse'
        );
        
        $event = new EventEntity($data);
        $this->assertTrue(is_array($event->getArrayCopy()));
    }
    
    public function testGetArrayCopyRenvoieUnTableau() {
        
    }
    
}

?>