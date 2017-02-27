<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
/**
 * Stocks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Suppliers
 * @property \Cake\ORM\Association\HasMany $StockProducts
 *
 * @method \App\Model\Entity\Stock get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stock newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stock|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stock[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stock findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StocksTable extends Table
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

        $this->table('stocks');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id'
        ]);
        $this->hasMany('StockProducts', [
            'foreignKey' => 'stock_id'
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
            ->integer('total_quantity')
            ->allowEmpty('total_quantity');

        $validator
            ->numeric('total_price')
            ->allowEmpty('total_price');

        $validator
            ->integer('discount_stock')
            ->allowEmpty('discount_stock');

        $validator
            ->numeric('final_price')
            ->allowEmpty('final_price');

        $validator
            ->integer('actions')
            ->requirePresence('actions', 'create')
            ->allowEmpty('actions');

        $validator
            ->allowEmpty('tel');

        $validator
            ->allowEmpty('address');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));

        return $rules;
    }

    public function getInfosSearch($conditions, $limit = null, $page = null){
        $Stock = TableRegistry::get('Stocks');
        $stocks = $Stock->find()->contain([
            'Users' => function ($q) {
                return $q->autoFields(false)->select(['Users.id','Users.username']);
            },
            'StockProducts' => function ($q) {
                return $q->autoFields(false)->select(['StockProducts.id','StockProducts.quantity','StockProducts.discount','StockProducts.price','StockProducts.stock_id','StockProducts.product_id','Products.id','Products.sku','Products.product_name','Products.supply_price'])->innerJoinWith('Products');
            },
            'Suppliers' => function ($q) {
                return $q->autoFields(false)->select(['Suppliers.id','Suppliers.name']);
            }
        ])->where($conditions);
        return $stocks;
    }

    public function MaxCode() {
        $Stock = TableRegistry::get('Stocks');
        $maxcode = $Stock->find()->select(['code' => 'MAX(Stocks.code)'])->first();
        $maxcode = $maxcode->code+1;
        return $maxcode;
    }
}
