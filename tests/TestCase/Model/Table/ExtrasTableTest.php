<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExtrasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExtrasTable Test Case
 */
class ExtrasTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\ExtrasTable     */
    public $Extras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.extras',
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
        'app.suppliers',
        'app.stocks',
        'app.stock_products',
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
        $config = TableRegistry::exists('Extras') ? [] : ['className' => 'App\Model\Table\ExtrasTable'];        $this->Extras = TableRegistry::get('Extras', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Extras);

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
