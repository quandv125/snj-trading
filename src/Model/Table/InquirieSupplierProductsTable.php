<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InquirieSupplierProducts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $InquirieSuppliers
 * @property \Cake\ORM\Association\BelongsTo $InquirieProducts
 *
 * @method \App\Model\Entity\InquirieSupplierProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\InquirieSupplierProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InquirieSupplierProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InquirieSupplierProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InquirieSupplierProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InquirieSupplierProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InquirieSupplierProduct findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class InquirieSupplierProductsTable extends Table
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

        $this->table('inquirie_supplier_products');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('InquirieSuppliers', [
            'foreignKey' => 'inquirie_supplier_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('InquirieProducts', [
            'foreignKey' => 'inquirie_product_id',
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
        $validator->integer('id')->allowEmpty('id', 'create');
        $validator->decimal('price')->allowEmpty('price');
        $validator->boolean('choose')->allowEmpty('choose');
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
        $rules->add($rules->existsIn(['inquirie_supplier_id'], 'InquirieSuppliers'));
        $rules->add($rules->existsIn(['inquirie_product_id'], 'InquirieProducts'));

        return $rules;
    }
}
