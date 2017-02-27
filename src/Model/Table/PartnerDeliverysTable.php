<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PartnerDeliverys Model
 *
 * @property \Cake\ORM\Association\HasMany $Invoices
 *
 * @method \App\Model\Entity\PartnerDelivery get($primaryKey, $options = [])
 * @method \App\Model\Entity\PartnerDelivery newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PartnerDelivery[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PartnerDelivery|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PartnerDelivery patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PartnerDelivery[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PartnerDelivery findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PartnerDeliverysTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('partner_deliverys');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Invoices', [
            'foreignKey' => 'partner_delivery_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('code')
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('tel');

        $validator
            ->allowEmpty('address');

        $validator
            ->allowEmpty('location');

        $validator
            ->allowEmpty('fax');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->boolean('gender')
            ->allowEmpty('gender');

        $validator
            ->allowEmpty('tax_registration_number');

        $validator
            ->allowEmpty('note');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
