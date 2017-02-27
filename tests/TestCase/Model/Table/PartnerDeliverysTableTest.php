<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PartnerDeliverysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PartnerDeliverysTable Test Case
 */
class PartnerDeliverysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PartnerDeliverysTable
     */
    public $PartnerDeliverys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.partner_deliverys',
        'app.invoices',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.groups',
        'app.images',
        'app.products',
        'app.categories',
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
        'app.coupons'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PartnerDeliverys') ? [] : ['className' => 'App\Model\Table\PartnerDeliverysTable'];
        $this->PartnerDeliverys = TableRegistry::get('PartnerDeliverys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PartnerDeliverys);

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
