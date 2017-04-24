<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InquirieSuppliersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InquirieSuppliersTable Test Case
 */
class InquirieSuppliersTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\InquirieSuppliersTable     */
    public $InquirieSuppliers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.inquirie_supplier_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InquirieSuppliers') ? [] : ['className' => 'App\Model\Table\InquirieSuppliersTable'];        $this->InquirieSuppliers = TableRegistry::get('InquirieSuppliers', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InquirieSuppliers);

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
