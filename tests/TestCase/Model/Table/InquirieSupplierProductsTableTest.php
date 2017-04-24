<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InquirieSupplierProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InquirieSupplierProductsTable Test Case
 */
class InquirieSupplierProductsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\InquirieSupplierProductsTable     */
    public $InquirieSupplierProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inquirie_supplier_products',
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
        'app.inquire_supplier_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InquirieSupplierProducts') ? [] : ['className' => 'App\Model\Table\InquirieSupplierProductsTable'];        $this->InquirieSupplierProducts = TableRegistry::get('InquirieSupplierProducts', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InquirieSupplierProducts);

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
