<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductOptions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 * @property \Cake\ORM\Association\BelongsTo $ParentProductOptions
 * @property \Cake\ORM\Association\HasMany $ChildProductOptions
 *
 * @method \App\Model\Entity\ProductOption get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductOption newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductOption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductOption|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductOption[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductOption findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */class ProductOptionsTable extends Table
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

        $this->table('product_options');
        $this->displayField('name');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ParentProductOptions', [
            'className' => 'ProductOptions',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildProductOptions', [
            'className' => 'ProductOptions',
            'foreignKey' => 'parent_id'
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
            ->integer('id')            ->requirePresence('id', 'create')            ->notEmpty('id');
        $validator
            ->requirePresence('name', 'create')            ->notEmpty('name');
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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['parent_id'], 'ParentProductOptions'));

        return $rules;
    }
}
