<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
class PagesTable extends Table
{


    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('Pages');
        // $this->displayField('id');
        // $this->primaryKey('id');

        // $this->addBehavior('Timestamp');

        // $this->belongsTo('Categories', [
        //     'foreignKey' => 'categorie_id',
        //     'joinType' => 'INNER'
        // ]);
        // $this->belongsTo('Outlets', [
        //     'foreignKey' => 'outlet_id'
        // ]);
        // $this->belongsTo('Suppliers', [
        //     'foreignKey' => 'supplier_id'
        // ]);
        // $this->hasMany('Images', [
        //     'foreignKey' => 'Page_id'
        // ]);
        // $this->hasMany('InvoicePages', [
        //     'foreignKey' => 'Page_id'
        // ]);
        // $this->hasMany('StockPages', [
        //     'foreignKey' => 'Page_id'
        // ]);
        // $this->hasMany('Tags', [
        //     'foreignKey' => 'Page_id'
        // ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        // $validator
        //     ->integer('id')
        //     ->allowEmpty('id', 'create');

        // $validator
        //     ->allowEmpty('sku');

        // $validator
        //     ->requirePresence('Page_name', 'create')
        //     ->notEmpty('Page_name');

        // $validator
        //     ->integer('status')
        //     ->allowEmpty('status');

        // $validator
        //     ->decimal('retail_price')
        //     ->allowEmpty('retail_price');

        // $validator
        //     ->decimal('wholesale_price')
        //     ->allowEmpty('wholesale_price');

        // $validator
        //     ->decimal('supply_price')
        //     ->allowEmpty('supply_price');

        // $validator
        //     ->integer('stock_level')
        //     ->allowEmpty('stock_level');

        // $validator
        //     ->allowEmpty('unit');

        // $validator
        //     ->allowEmpty('variants');

        // $validator
        //     ->allowEmpty('description');

        // $validator
        //     ->integer('stock_min')
        //     ->allowEmpty('stock_min');

        // $validator
        //     ->integer('stock_max')
        //     ->allowEmpty('stock_max');

        // $validator
        //     ->allowEmpty('ordering_note');

        // return $validator;
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
        // $rules->add($rules->existsIn(['categorie_id'], 'Categories'));
        // $rules->add($rules->existsIn(['outlet_id'], 'Outlets'));
        // $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));

        // return $rules;
    }

    // public function query() {
    //     $conn = ConnectionManager::get('default');
    //     $query = $conn->execute('
    //         SELECT Products.id, Products.product_name, Products.retail_price, Image.path, Image.thumbnail

    //         FROM Products
    //         LEFT JOIN images AS Image ON Image.product_id = Products.id
    //         -- Where Products.categorie_id = 1 
    //         -- INNER JOIN images AS Image ON Image.product_id = Products.id
    //         LIMIT 4
    //         -- union
    //         -- SELECT Products.id, Products.product_name, Products.categorie_id
    //         -- FROM Products
    //         -- Where Products.categorie_id = 4 
            
    //     ');
    //     $results = $query->fetchAll('assoc');
    //     return $results;
    // }
    
    public function getInfoProducts($conditions = null) {
        $Product    = TableRegistry::get('Products');
        $products   = $Product->find()->contain([
            'Categories' => function ($q) {
                return $q->autoFields(false)->select(['id','name']);
            },
             'Suppliers' => function ($q) {
                return $q->autoFields(false)->select(['id','name']);
            },
            'Images' => function($q){
                return $q->select(['id','product_id','path','thumbnail']);
            }])
            ->select(['Products.id','Products.sku','Products.product_name','Products.categorie_id','Products.vat','Products.type_model','Products.origin','Products.quantity','Products.serial_no','Products.retail_price','Products.short_description'])
            ->order(['Products.created' => 'ASC'])
            ->Where([$conditions])
            ->limit(LIMIT)->toarray();
         
        return $products;
    }

    public function getOneProducts($conditions = null) {
        $Product    = TableRegistry::get('Products');
        $product   = $Product->find()->contain([
            'Categories' => function ($q) {
                return $q->autoFields(false)->select(['id','name']);
            },
            'Suppliers' => function ($q) {
                return $q->autoFields(false)->select(['id','name']);
            },
            'Images' => function ($q) {
                return $q->autoFields(false)->select(['id','product_id','path','thumbnail']);
            },
            'Users' => function ($q) {
                return $q->autoFields(false)->select(['id','username']);
            },
            // 'InvoiceProducts' => function ($q) {
            //     return $q->autoFields(false)->select(['InvoiceProducts.id','InvoiceProducts.quantity','InvoiceProducts.invoice_id','InvoiceProducts.product_id','Invoices.id','Invoices.status','Invoices.total'])->innerJoinWith('Invoices');
            // }
            ])->where($conditions)->order(['Products.created' => 'DESC'])->first();
        
        return $product;
    }

    public function getProducts($conditions = null, $limit = null, $page = null)  {
        $lm = ($limit == null)? LIMIT : $limit;
        $pg = ($page == null)? 1 : $page;
        $Product = TableRegistry::get('Products');
        $products = $Product->find()->contain([
            'Categories' => function ($q) {
                return $q->autoFields(false)->select(['id','name']);
            },
             'Suppliers' => function ($q) {
                return $q->autoFields(false)->select(['id','name']);
            },
            'Images' => function ($q) {
                return $q->autoFields(false)->select(['id','product_id','path','thumbnail']);
            },
            ])->where($conditions)->limit($lm)->page($pg)->order(['Products.created' => 'DESC']);
        return $products;
    }

    public function getProductsIndex($conditions = null, $limit = null, $page = null)  {
        $lm = ($limit == null)? LIMIT : $limit;
        $pg = ($page == null)? 1 : $page;
        $Product = TableRegistry::get('Products');
        $products = $Product->find()->contain([
            'Categories' => function ($q) {
                return $q->autoFields(false)->select(['id','name']);
            }
            ])
            ->select(['id','sku','product_name','categorie_id','actived','status','origin','type_model','serial_no','created'])
            ->where($conditions)->limit($lm)->page($pg)->order(['Products.created' => 'DESC']);
        // pr($products->toarray());die();
        return $products;
    }

    public function getInfoSearch($conditions = null, $conditions2 = null) {
        $Product    = TableRegistry::get('Products');
        $products   = $Product->find()->contain([
            'Categories' => function ($q) {
                return $q->autoFields(false)->select(['id','name']);
            },
            'Suppliers' => function ($q) {
                return $q->autoFields(false)->select(['id','name']);
            },
            'Images' => function($q){
                return $q->select(['id','product_id','path','thumbnail']);
            }])
            ->select(['Products.id','Products.sku','Products.product_name','Products.categorie_id','Products.type_model','Products.origin','Products.quantity','Products.serial_no','Products.retail_price','Products.short_description'])
            ->order(['Products.created' => 'DESC'])
            ->Where([$conditions])
            ->orWhere($conditions2);
            // ->limit(LIMIT);
        return $products;
        // $test = $Product->find()->where(['Products.id' => 8])->orWhere(['Products.product_name' => 'note 3'])->orWhere(['Products.sku' => 5491]);
    }
}
