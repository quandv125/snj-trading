<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $sku
 * @property string $product_name
 * @property int $categorie_id
 * @property int $outlet_id
 * @property int $supplier_id
 * @property int $user_id
 * @property bool $actived
 * @property int $status
 * @property float $retail_price
 * @property float $wholesale_price
 * @property float $supply_price
 * @property string $origin
 * @property int $quantity
 * @property string $type_model
 * @property string $serial_no
 * @property int $stock_level
 * @property string $unit
 * @property string $variants
 * @property int $rating
 * @property string $short_description
 * @property string $description
 * @property int $stock_min
 * @property int $stock_max
 * @property string $ordering_note
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Outlet $outlet
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Image[] $images
 * @property \App\Model\Entity\InvoiceProduct[] $invoice_products
 * @property \App\Model\Entity\StockProduct[] $stock_products
 * @property \App\Model\Entity\Tag[] $tags
 */
class Product extends Entity
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
