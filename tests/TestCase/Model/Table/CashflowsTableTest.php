<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CashflowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CashflowsTable Test Case
 */
class CashflowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CashflowsTable
     */
    public $Cashflows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cashflows',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.images',
        'app.products',
        'app.categories',
        'app.outlets',
        'app.invoices',
        'app.customers',
        'app.payments',
        'app.coupons',
        'app.partner_deliverys',
        'app.invoice_products',
        'app.suppliers',
        'app.stock_products',
        'app.logs',
        'app.stocks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cashflows') ? [] : ['className' => 'App\Model\Table\CashflowsTable'];
        $this->Cashflows = TableRegistry::get('Cashflows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cashflows);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
