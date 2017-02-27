<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property int $id
 * @property string $code
 * @property int $user_id
 * @property \Cake\I18n\Time $create_by
 * @property string $status
 * @property int $type
 * @property int $customer_id
 * @property int $outlet_id
 * @property int $coupon_id
 * @property int $payment_id
 * @property int $partner_delivery_id
 * @property float $total
 * @property float $customers_paid
 * @property float $money
 * @property float $return_money
 * @property int $discount
 * @property string $note
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Outlet $outlet
 * @property \App\Model\Entity\Coupon $coupon
 * @property \App\Model\Entity\Payment $payment
 * @property \App\Model\Entity\PartnerDelivery $partner_delivery
 * @property \App\Model\Entity\InvoiceProduct[] $invoice_products
 */
class Invoice extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
