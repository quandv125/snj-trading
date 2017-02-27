<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StockProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StockProductsTable Test Case
 */
class StockProductsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StockProductsTable
     */
    public $StockProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stock_products',
        'app.products',
        'app.categories',
        'app.outlets',
        'app.invoices',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.images',
        'app.cashflows',
        'app.logs',
        'app.stocks',
        'app.suppliers',
        'app.customers',
        'app.payments',
        'app.coupons',
        'app.partner_deliverys',
        'app.invoice_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StockProducts') ? [] : ['className' => 'App\Model\Table\StockProductsTable'];
        $this->StockProducts = TableRegistry::get('StockProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StockProducts);

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
