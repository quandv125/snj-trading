<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WishlistsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WishlistsTable Test Case
 */
class WishlistsTableTest extends TestCase
{

    /**
     * Test subject     *
     * @var \App\Model\Table\WishlistsTable     */
    public $Wishlists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wishlists',
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
        $config = TableRegistry::exists('Wishlists') ? [] : ['className' => 'App\Model\Table\WishlistsTable'];        $this->Wishlists = TableRegistry::get('Wishlists', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Wishlists);

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
