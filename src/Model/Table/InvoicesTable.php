<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
/**
 * Invoices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Outlets
 * @property \Cake\ORM\Association\BelongsTo $Coupons
 * @property \Cake\ORM\Association\BelongsTo $Payments
 * @property \Cake\ORM\Association\BelongsTo $PartnerDeliverys
 * @property \Cake\ORM\Association\HasMany $InvoiceProducts
 *
 * @method \App\Model\Entity\Invoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\Invoice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Invoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Invoice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Invoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InvoicesTable extends Table
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

        $this->table('invoices');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Outlets', [
            'foreignKey' => 'outlet_id'
        ]);
        $this->belongsTo('Coupons', [
            'foreignKey' => 'coupon_id'
        ]);
        $this->belongsTo('Payments', [
            'foreignKey' => 'payment_id'
        ]);
        $this->belongsTo('PartnerDeliverys', [
            'foreignKey' => 'partner_delivery_id'
        ]);
        $this->hasMany('InvoiceProducts', [
            'foreignKey' => 'invoice_id'
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
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->dateTime('create_by')
            ->allowEmpty('create_by');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('type')
            ->allowEmpty('type');

        $validator
            ->decimal('total')
            ->requirePresence('total', 'create')
            ->allowEmpty('total');

        $validator
            ->decimal('customers_paid')
            ->requirePresence('customers_paid', 'create')
            ->allowEmpty('customers_paid');

        $validator
            ->decimal('money')
            ->requirePresence('money', 'create')
            ->allowEmpty('money');

        $validator
            ->decimal('return_money')
            ->requirePresence('return_money', 'create')
            ->allowEmpty('return_money');

        $validator
            ->integer('discount')
            ->allowEmpty('discount');

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
        // $rules->add($rules->existsIn(['user_id'], 'Users'));
        // $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        // $rules->add($rules->existsIn(['outlet_id'], 'Outlets'));
        // $rules->add($rules->existsIn(['coupon_id'], 'Coupons'));
        // $rules->add($rules->existsIn(['payment_id'], 'Payments'));
        // $rules->add($rules->existsIn(['partner_delivery_id'], 'PartnerDeliverys'));

        return $rules;
    }
    public function getInfosSearch($conditions, $limit = null, $page = null){
        $Invoice = TableRegistry::get('Invoices');
        $invoices = $Invoice->find()->join([
            'table' => 'users',
            'alias' => 'CreateBy',
            'type' => 'LEFT',
            'conditions' => ['Invoices.create_by = CreateBy.id']
        ])->contain([
            'Users' => function ($q) {
                return $q->autoFields(false)->select(['id','username']);
            },
            'InvoiceProducts' => function ($q) {
                return $q->autoFields(false)->select(['InvoiceProducts.id','InvoiceProducts.price','InvoiceProducts.quantity','InvoiceProducts.invoice_id','InvoiceProducts.product_id','Products.id','Products.sku','Products.product_name','Products.retail_price'])->innerJoinWith('Products');
            },
            'Customers',
            'Outlets',
            'Coupons',
            'Payments',
            'PartnerDeliverys'
        ])->select(['Invoices.id','Invoices.code','Invoices.user_id','Invoices.create_by','Invoices.status','Invoices.customer_id','Invoices.outlet_id','Invoices.coupon_id','Invoices.payment_id','Invoices.partner_delivery_id','Invoices.total','Invoices.customers_paid','Invoices.money','Invoices.return_money','Invoices.discount','Invoices.note','Invoices.created','CreateBy.username','Customers.name','Users.username'])
        ->where($conditions)->order(['Invoices.created'  => 'DESC']);
      
        return $invoices;
    }
    
    public function MaxCode() {
        $Invoice = TableRegistry::get('Invoices');
        $max_code = $Invoice->find()->select(['code' => 'MAX(Invoices.code)'])->first();
        $max_code = $max_code->code+1;
        return $max_code;
    }
}
