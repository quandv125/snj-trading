<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InquirieProduct Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int $inquiry_id
 * @property int $status
 * @property string $partno
 * @property string $name
 * @property string $maker_type_ref
 * @property string $amount
 * @property float $price
 * @property int $quantity
 * @property string $remark
 * @property string $unit
 * @property bool $level
 * @property int $main
 * @property int $parent
 * @property int $no
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Inquiry $inquiry
 * @property \App\Model\Entity\InquirieSupplierProduct[] $inquirie_supplier_products
 */class InquirieProduct extends Entity
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
