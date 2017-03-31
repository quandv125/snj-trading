<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Unavailable Entity
 *
 * @property int $id
 * @property int $invoice_id
 * @property string $part_no
 * @property string $product_name
 * @property string $vessel_name
 * @property string $engine_maker
 * @property string $engine_type
 * @property string $model_serial_no
 * @property int $quantity
 * @property string $description
 * @property string $remark
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Invoice $invoice
 */class Unavailable extends Entity
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
