<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InquireSupplierProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InquireSupplierProductsTable Test Case
 */
class InquireSupplierProductsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\InquireSupplierProductsTable     */
    public $InquireSupplierProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inquire_supplier_products',
        'app.inquirie_suppliers',
        'app.inquiries',
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
        'app.unavailables',
        'app.suppliers',
        'app.stocks',
        'app.stock_products',
        'app.tags',
        'app.cashflows',
        'app.logs',
        'app.inquirie_products',
        'app.inq_supplier_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InquireSupplierProducts') ? [] : ['className' => 'App\Model\Table\InquireSupplierProductsTable'];        $this->InquireSupplierProducts = TableRegistry::get('InquireSupplierProducts', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InquireSupplierProducts);

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
