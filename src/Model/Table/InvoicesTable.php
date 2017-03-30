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

        // $validator
        //     ->decimal('total')
        //     ->requirePresence('total', 'create')
        //     ->allowEmpty('total');

        // $validator
        //     ->decimal('customers_paid')
        //     ->requirePresence('customers_paid', 'create')
        //     ->allowEmpty('customers_paid');

        // $validator
        //     ->decimal('money')
        //     ->requirePresence('money', 'create')
        //     ->allowEmpty('money');

        // $validator
        //     ->decimal('return_money')
        //     ->requirePresence('return_money', 'create')
        //     ->allowEmpty('return_money');

        // $validator
        //     ->integer('discount')
        //     ->allowEmpty('discount');

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
                return $q->autoFields(false)->select(['InvoiceProducts.id','InvoiceProducts.price','InvoiceProducts.quantity','InvoiceProducts.invoice_id','InvoiceProducts.product_id','Products.id','Products.sku','Products.product_name','Products.user_id'])->innerJoinWith('Products');
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

    public function getInfo($id){
        $Invoice = TableRegistry::get('Invoices');
      
        $invoices = $Invoice->find()
        ->join([
            'table' => 'users',
            'alias' => 'Users',
            'conditions' => ['Invoices.user_id = Users.id']
        ])
        ->contain([
            'InvoiceProducts' => function ($q) {
                return $q->autoFields(false)->select(['InvoiceProducts.id','InvoiceProducts.quantity','InvoiceProducts.remark','InvoiceProducts.invoice_id','InvoiceProducts.product_id','products.id','products.sku','products.product_name','products.serial_no','products.type_model','products.origin','products.retail_price','products.user_id','categories.id','categories.name'])
                    ->leftJoin('products','products.id = InvoiceProducts.product_id')
                    ->leftJoin('categories', 'categories.id = products.categorie_id');
            },
          
        ])
        ->select(['Invoices.id','Invoices.code','Invoices.profit','Invoices.status','Invoices.delivery_cost','Invoices.packing_cost','Invoices.insurance_cost','Invoices.note','Invoices.created','Users.id','Users.email'])
        ->where(['Invoices.id' => $id])
        ->order(['Invoices.created'  => 'DESC'])->first();

        return $invoices;
    }


    public function sendordertocustomer($data, $invoices) {
            $total = $data['price']+$data['delivery_cost']+$data['packing_cost']+$data['insurance_cost']+(($data['price']*$data['profit'])/100);
            $html = '';
            $html .= ' <table cellspacing="0" class="shop_table cart table" style="border: 1px solid #e5e5e5;border-collapse: collapse;border-radius: 0;margin: 0 0 30px; text-align: left;width: 100%;">
                        <thead style="color: #fff;background: #f4f4f4;text-align: center;position: relative;">
                            <tr>
                                <th class="text-center" style=" border-color: #e5e5e5;color: #333;border: 1px solid #e5e5e5;padding: 10px 10px;">#
                                </th>
                                <th class="text-center" style=" border-color: #e5e5e5;color: #333;border: 1px solid #e5e5e5;padding: 10px 10px;">Name
                                </th>
                                <th class="text-center" style=" border-color: #e5e5e5;color: #333;border: 1px solid #e5e5e5;padding: 10px 10px;">Category
                                </th>
                                <th class="text-center" style=" border-color: #e5e5e5;color: #333;border: 1px solid #e5e5e5;padding: 10px 10px;">Serial No
                                </th>
                                <th class="text-center" style=" border-color: #e5e5e5;color: #333;border: 1px solid #e5e5e5;padding: 10px 10px;">Type Model
                                </th>
                                <th class="text-center" style=" border-color: #e5e5e5;color: #333;border: 1px solid #e5e5e5;padding: 10px 10px;">Origin
                                </th>
                                <th class="text-center" style=" border-color: #e5e5e5;color: #333;border: 1px solid #e5e5e5;padding: 10px 10px;">Price
                                </th>
                                <th class="text-center" style=" border-color: #e5e5e5;color: #333;border: 1px solid #e5e5e5;padding: 10px 10px;">Quantity
                                </th>
                                <th class="text-center" style=" border-color: #e5e5e5;color: #333;border: 1px solid #e5e5e5;padding: 10px 10px;">Remark
                                </th>
                            </tr>
                        </thead>
                        <tbody>';
                foreach ($invoices['invoice_products'] as $key => $value) {
                    $html .='
                        <tr class="cart_item">
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                <span class="">'.($key+1).'</span>
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                '.$value["products"]["product_name"].'
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                '.$value["categories"]["name"].'
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                '.$value["products"]["serial_no"].'
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                '.$value["products"]["type_model"].'
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                '.$value["products"]["origin"].'
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                '.($value["products"]["retail_price"]+($value["products"]["retail_price"]*$data['profit'])/100).'
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                <div class="info-qty" id="0">
                                    <span class="qty-val">
                                        '.$value["quantity"].'
                                    </span>
                                </div>
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">  
                                '.$value["remark"].' 
                            </td>
                        </tr>
                    ';
                }
                $html .= '</tbody>
                    </table><br/>
                    <div class=" table-responsive float-right" style="width:412px;">
                        <table cellspacing="0" class="shop_table cart table" style="float:right; border: 1px solid #e5e5e5;border-collapse: collapse;border-radius: 0;margin: 0 0 30px; text-align: left;width: 100%;">
                            <tr>
                                <td class="text-center" style="background: #f4f4f4;border: 1px solid #e5e5e5 !important;color: #555;margin: 0;"><b>Delivery cost:</b></td>
                                <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;margin: 0;">$ '.$data['delivery_cost'].'</td>
                            </tr>
                            <tr>
                                <td class="text-center" style="background: #f4f4f4;border: 1px solid #e5e5e5 !important;color: #555;margin: 0;"><b>Packing cost:</b></td>
                                <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;margin: 0;">$ '.$data['packing_cost'].'</td>
                            </tr>
                            <tr>
                                <td class="text-center" style="background: #f4f4f4;border: 1px solid #e5e5e5 !important;color: #555;margin: 0;"><b>Insurance cost:</b></td>
                                <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;margin: 0;">$ '.$data['insurance_cost'].'</td>
                            </tr>
                            <tr>
                                <td class="text-center" style="background: #f4f4f4;border: 1px solid #e5e5e5 !important;color: #555;margin: 0;"><b>Total:</b></td>
                                <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;margin: 0;">
                                    <span class="total-price">
                                        $ '.number_format($total, 2).'
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>';
                   
                return $html;
            
    }
}
