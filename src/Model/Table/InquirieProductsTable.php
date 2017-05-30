<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InquirieProducts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 * @property \Cake\ORM\Association\BelongsTo $Inquiries
 * @property \Cake\ORM\Association\HasMany $InquirieSupplierProducts
 *
 * @method \App\Model\Entity\InquirieProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\InquirieProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InquirieProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InquirieProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InquirieProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InquirieProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InquirieProduct findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class InquirieProductsTable extends Table
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

        $this->table('inquirie_products');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id'
        ]);
        $this->belongsTo('Inquiries', [
            'foreignKey' => 'inquiry_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('InquirieSupplierProducts', [
            'dependent' => true,
            'foreignKey' => 'inquirie_product_id'
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
            ->integer('status')
            ->allowEmpty('status');
        $validator
            ->allowEmpty('partno');
        $validator
            ->allowEmpty('name');
        $validator
            ->allowEmpty('maker_type_ref');
        $validator
            ->allowEmpty('amount');
        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->allowEmpty('price');
        $validator
            ->integer('quantity')
            ->allowEmpty('quantity');
        $validator
            ->allowEmpty('remark');
        $validator
            ->allowEmpty('unit');
        $validator
            ->boolean('level')
            ->allowEmpty('level');
        $validator
            ->integer('main')
            ->allowEmpty('main');
        $validator
            ->integer('parent')
            ->allowEmpty('parent');
        $validator
            ->integer('no')
            ->allowEmpty('no');
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
        $rules->add($rules->existsIn(['inquiry_id'], 'Inquiries'));

        return $rules;
    }
}
