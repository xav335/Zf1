<?php
namespace CoursesTest\Model\Entity;

use Courses\Model\Entity\EventEntity;
/**
 * @backupGlobals disabled
 */
class EventEntityTest extends \PHPUnit_Framework_TestCase
{
    public function testNewCreeUneInstanceVide(){
        $event = new EventEntity();
        $this->assertNull($event->id);
        $this->assertNull($event->name);
        $this->assertNull($event->description);
        $this->assertNull($event->date);
        $this->assertNull($event->location);
        
    }
    
    public function testExchangeArrayValoriseLesAttributs(){
        $data = array(
            'id' => 5,
            'name' => 'Un événement',
            'description' => 'Super événement',
            'date' => '2015-04-22',
            'location' => 'Ici'
        );
        
        $event = new EventEntity();
        $event->exchangeArray($data);
        
        $this->assertEquals($data['id'], $event->id);
        $this->assertEquals($data['name'], $event->name);
        $this->assertEquals($data['description'], $event->description);
        $this->assertEquals($data['location'], $event->location);
        $this->assertInstanceOf('DateTime', $event->date);
        $this->assertEquals(new \DateTime($data['date']), $event->date);
        $this->assertEquals($data['id'], $event->id );
        
    }
    
    public function testNewAvecOptionsCreeUneInstanceValorisee(){
        $data = array(
            'id' => 5,
            'name' => 'Un événement',
            'description' => 'Super événement',
            'date' => '2015-04-22',
            'location' => 'Ici'
        );
        
        $event = new EventEntity($data);
        
        $this->assertEquals($data['id'], $event->id);
        $this->assertEquals($data['name'], $event->name);
        $this->assertEquals($data['description'], $event->description);
        $this->assertEquals($data['location'], $event->location);
        $this->assertInstanceOf('DateTime', $event->date);
        $this->assertEquals(new \DateTime($data['date']), $event->date);
        $this->assertEquals($data['id'], $event->id );
        
    }
    
    public function testGetArrayCopyRenvoieUnTableau(){
        $data = array(
            'id' => 5,
            'name' => 'Un événement',
            'description' => 'Super événement',
            'date' => '2015-04-22',
            'location' => 'Ici'
        );
        
        $event = new EventEntity($data);
        $this->assertTrue(is_array($event->getArrayCopy()));
    }
}

?>