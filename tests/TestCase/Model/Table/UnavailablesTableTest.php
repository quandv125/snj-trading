<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UnavailablesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UnavailablesTable Test Case
 */
class UnavailablesTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\UnavailablesTable     */
    public $Unavailables;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.unavailables',
        'app.invoices',
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
        'app.suppliers',
        'app.stocks',
        'app.stock_products',
        'app.invoice_products',
        'app.tags',
        'app.cashflows',
        'app.logs',
        'app.customers',
        'app.payments',
        'app.coupons',
        'app.partner_deliverys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Unavailables') ? [] : ['className' => 'App\Model\Table\UnavailablesTable'];        $this->Unavailables = TableRegistry::get('Unavailables', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Unavailables);

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
