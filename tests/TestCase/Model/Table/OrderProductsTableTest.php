<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderProductsTable Test Case
 */
class OrderProductsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\OrderProductsTable     */
    public $OrderProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.order_products',
        'app.orders',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.images',
        'app.products',
        'app.categories',
        'app.articles',
        'app.outlets',
        'app.invoices',
        'app.customers',
        'app.payments',
        'app.coupons',
        'app.partner_deliverys',
        'app.invoice_products',
        'app.inquirie_supplier_products',
        'app.inquirie_suppliers',
        'app.inquiries',
        'app.inquirie_products',
        'app.attachments',
        'app.extras',
        'app.suppliers',
        'app.stocks',
        'app.stock_products',
        'app.supplier_pics',
        'app.unavailables',
        'app.tags',
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
        $config = TableRegistry::exists('OrderProducts') ? [] : ['className' => 'App\Model\Table\OrderProductsTable'];        $this->OrderProducts = TableRegistry::get('OrderProducts', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrderProducts);

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
