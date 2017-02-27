<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OutletsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OutletsTable Test Case
 */
class OutletsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OutletsTable
     */
    public $Outlets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.outlets',
        'app.invoices',
        'app.products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Outlets') ? [] : ['className' => 'App\Model\Table\OutletsTable'];
        $this->Outlets = TableRegistry::get('Outlets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Outlets);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
