<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\TestComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\TestComponent Test Case
 */
class TestComponentTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Controller\Component\TestComponent     */
    public $Test;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();        $this->Test = new TestComponent($registry);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Test);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
