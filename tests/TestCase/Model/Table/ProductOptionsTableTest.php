<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductOptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductOptionsTable Test Case
 */
class ProductOptionsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\ProductOptionsTable     */
    public $ProductOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_options',
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
        'app.inquirie_products',
        'app.attachments',
        'app.extras',
        'app.supplier_pics',
        'app.unavailables',
        'app.tags',
        'app.options'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductOptions') ? [] : ['className' => 'App\Model\Table\ProductOptionsTable'];        $this->ProductOptions = TableRegistry::get('ProductOptions', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductOptions);

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
