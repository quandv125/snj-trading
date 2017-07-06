<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplierPicsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplierPicsTable Test Case
 */
class SupplierPicsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\SupplierPicsTable     */
    public $SupplierPics;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.supplier_pics',
        'app.suppliers',
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
        'app.stock_products',
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
        $config = TableRegistry::exists('SupplierPics') ? [] : ['className' => 'App\Model\Table\SupplierPicsTable'];        $this->SupplierPics = TableRegistry::get('SupplierPics', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupplierPics);

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
