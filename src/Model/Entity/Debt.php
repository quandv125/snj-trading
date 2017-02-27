<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Debt Entity
 *
 * @property int $id
 * @property int $supplier_id
 * @property int $customer_id
 * @property int $stock_id
 * @property int $invoice_id
 * @property float $money
 * @property int $note
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Stock $stock
 * @property \App\Model\Entity\Invoice $invoice
 */
class Debt extends Entity
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
