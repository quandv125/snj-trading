<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductOption Entity
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property int $parent_id
 * @property int $lft
 * @property int $rght
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Option $option
 */class ProductOption extends Entity
{

}
