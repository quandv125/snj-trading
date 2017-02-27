<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StocksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StocksTable Test Case
 */
class StocksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StocksTable
     */
    public $Stocks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stocks',
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
        'app.cashflows',
        'app.logs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Stocks') ? [] : ['className' => 'App\Model\Table\StocksTable'];
        $this->Stocks = TableRegistry::get('Stocks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stocks);

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
