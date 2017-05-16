<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Extras Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Inquiries
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Extra get($primaryKey, $options = [])
 * @method \App\Model\Entity\Extra newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Extra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Extra|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Extra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Extra[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Extra findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class ExtrasTable extends Table
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

        $this->table('extras');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Inquiries', [
            'foreignKey' => 'inquiry_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->requirePresence('name', 'create')            ->notEmpty('name');
        $validator
            ->decimal('cost')            ->allowEmpty('cost');
        $validator
            ->numeric('profit')            ->allowEmpty('profit');
        $validator
            ->decimal('final')            ->allowEmpty('final');
        $validator
            ->integer('type')            ->allowEmpty('type');
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
        $rules->add($rules->existsIn(['inquiry_id'], 'Inquiries'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
