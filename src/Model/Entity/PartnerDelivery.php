<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PartnerDelivery Entity
 *
 * @property int $id
 * @property int $code
 * @property string $name
 * @property string $tel
 * @property string $address
 * @property string $location
 * @property string $fax
 * @property string $email
 * @property bool $gender
 * @property string $tax_registration_number
 * @property string $note
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Invoice[] $invoices
 */
class PartnerDelivery extends Entity
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
