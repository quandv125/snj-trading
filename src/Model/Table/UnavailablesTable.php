<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Unavailables Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Invoices
 *
 * @method \App\Model\Entity\Unavailable get($primaryKey, $options = [])
 * @method \App\Model\Entity\Unavailable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Unavailable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Unavailable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Unavailable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Unavailable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Unavailable findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class UnavailablesTable extends Table
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

        $this->table('unavailables');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Invoices', [
            'foreignKey' => 'invoice_id',
            'joinType' => 'INNER'
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
            ->integer('id')            ->allowEmpty('id', 'create');
        $validator
            ->requirePresence('part_no', 'create')            ->notEmpty('part_no');
        $validator
            ->requirePresence('product_name', 'create')            ->notEmpty('product_name');
        $validator
            ->allowEmpty('vessel_name');
        $validator
            ->allowEmpty('engine_maker');
        $validator
            ->allowEmpty('engine_type');
        $validator
            ->allowEmpty('model_serial_no');
        $validator
            ->integer('quantity')            ->allowEmpty('quantity');
        $validator
            ->allowEmpty('description');
        $validator
            ->allowEmpty('remark');
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
        $rules->add($rules->existsIn(['invoice_id'], 'Invoices'));

        return $rules;
    }
}
