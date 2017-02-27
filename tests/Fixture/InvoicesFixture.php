<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InvoicesFixture
 *
 */
class InvoicesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'code' => ['type' => 'string', 'fixed' => true, 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'create_by' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'string', 'fixed' => true, 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null],
        'type' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'customer_id' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'outlet_id' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'coupon_id' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'payment_id' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'partner_delivery_id' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'total' => ['type' => 'decimal', 'length' => 15, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'customers_paid' => ['type' => 'decimal', 'length' => 15, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'money' => ['type' => 'decimal', 'length' => 15, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'return_money' => ['type' => 'decimal', 'length' => 15, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'discount' => ['type' => 'integer', 'length' => 50, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'note' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_invoutlet' => ['type' => 'index', 'columns' => ['outlet_id'], 'length' => []],
            'fk_invcoupon' => ['type' => 'index', 'columns' => ['coupon_id'], 'length' => []],
            'fk_invpartner_deliverys' => ['type' => 'index', 'columns' => ['partner_delivery_id'], 'length' => []],
            'fk_invpayments' => ['type' => 'index', 'columns' => ['payment_id'], 'length' => []],
            'fk_invusers' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'fk_invcustomers' => ['type' => 'index', 'columns' => ['customer_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_invcistomers' => ['type' => 'foreign', 'columns' => ['customer_id'], 'references' => ['customers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_invcoupon' => ['type' => 'foreign', 'columns' => ['coupon_id'], 'references' => ['coupons', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_invoutlet' => ['type' => 'foreign', 'columns' => ['outlet_id'], 'references' => ['outlets', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_invpartner_deliverys' => ['type' => 'foreign', 'columns' => ['partner_delivery_id'], 'references' => ['partner_deliverys', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_invpayments' => ['type' => 'foreign', 'columns' => ['payment_id'], 'references' => ['customers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_invusers' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'code' => 'Lorem ipsum dolor sit amet',
            'user_id' => 1,
            'create_by' => '2017-01-17 10:27:28',
            'status' => 'Lorem ip',
            'type' => 1,
            'customer_id' => 1,
            'outlet_id' => 1,
            'coupon_id' => 1,
            'payment_id' => 1,
            'partner_delivery_id' => 1,
            'total' => 1.5,
            'customers_paid' => 1.5,
            'money' => 1.5,
            'return_money' => 1.5,
            'discount' => 1,
            'note' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-01-17 10:27:28',
            'modified' => '2017-01-17 10:27:28'
        ],
    ];
}
