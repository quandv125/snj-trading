<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inquiry Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $status
 * @property int $type
 * @property int $customer_id
 * @property string $vessel
 * @property string $imo_no
 * @property string $ref
 * @property int $discount
 * @property float $profit
 * @property float $delivery_cost
 * @property float $packing_cost
 * @property float $insurance_cost
 * @property string $description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\InquirieProduct[] $inquirie_products
 */class Inquiry extends Entity
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
