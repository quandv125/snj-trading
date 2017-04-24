<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InquirieProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InquirieProductsTable Test Case
 */
class InquirieProductsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\InquirieProductsTable     */
    public $InquirieProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inquirie_products',
        'app.products',
        'app.categories',
        'app.articles',
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
        'app.stock_products',
        'app.customers',
        'app.payments',
        'app.coupons',
        'app.partner_deliverys',
        'app.invoice_products',
        'app.inquirie_supplier_products',
        'app.inquirie_suppliers',
        'app.inquiries',
        'app.unavailables',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InquirieProducts') ? [] : ['className' => 'App\Model\Table\InquirieProductsTable'];        $this->InquirieProducts = TableRegistry::get('InquirieProducts', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InquirieProducts);

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
