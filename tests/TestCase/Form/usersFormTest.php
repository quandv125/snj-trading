<?php
namespace App\Test\TestCase\Form;

use App\Form\usersForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\usersForm Test Case
 */
class usersFormTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Form\usersForm     */
    public $users;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->users = new usersForm();    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->users);

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
