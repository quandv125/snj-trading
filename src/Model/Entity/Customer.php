<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $customer_group
 * @property string $tel
 * @property string $address
 * @property string $location
 * @property \Cake\I18n\Time $date_of_birth
 * @property string $email
 * @property int $gender
 * @property string $tax_registration_number
 * @property string $note
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\Payment[] $payments
 */
class Customer extends Entity
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
