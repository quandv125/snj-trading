<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
/**
 * Products Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\BelongsTo $Suppliers
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Images
 * @property \Cake\ORM\Association\HasMany $InvoiceProducts
 * @property \Cake\ORM\Association\HasMany $StockProducts
 * @property \Cake\ORM\Association\HasMany $Tags
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
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

		$this->table('products');
		$this->displayField('id');
		$this->primaryKey('id');

		$this->addBehavior('Timestamp');

		$this->belongsTo('Categories', [
			'foreignKey' => 'categorie_id',
			'joinType' => 'INNER'
		]);
		
		$this->belongsTo('Suppliers', [
			'foreignKey' => 'supplier_id'
		]);
		$this->belongsTo('Users', [
			'foreignKey' => 'user_id'
		]);
		$this->hasMany('Images', [
			'dependent' => true,
			'foreignKey' => 'product_id'
		]);
		
		$this->hasMany('ProductOptions', [
			 'dependent' => true,
			'foreignKey' => 'product_id'
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

		$validator->allowEmpty('sku');

		$validator->requirePresence('product_name', 'create')->notEmpty('product_name');

		$validator->boolean('actived')->requirePresence('actived', 'create')->notEmpty('actived');

		$validator->allowEmpty('status');

		$validator->decimal('retail_price')->allowEmpty('retail_price');

		$validator->decimal('wholesale_price')->allowEmpty('wholesale_price');

		$validator->decimal('supply_price')->allowEmpty('supply_price');

		$validator->allowEmpty('origin');

		$validator->integer('quantity')->allowEmpty('quantity');

		$validator->allowEmpty('type_model');

		$validator->allowEmpty('maker_name');

		$validator->allowEmpty('serial_no');

		$validator->integer('stock_level')->allowEmpty('stock_level');

		$validator->allowEmpty('unit');

		$validator->allowEmpty('variants');

		$validator->integer('rating')->allowEmpty('rating');

		$validator->allowEmpty('short_description');

		$validator->allowEmpty('description');

		$validator->integer('stock_min')->allowEmpty('stock_min');

		$validator->integer('stock_max')->allowEmpty('stock_max');

		$validator->allowEmpty('ordering_note');

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
		$rules->add($rules->existsIn(['categorie_id'], 'Categories'));
		$rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));
		$rules->add($rules->existsIn(['user_id'], 'Users'));

		return $rules;
	}

	public function getProductsSearch($conditions = null, $limit = null, $page = null)  {
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

	public function OneProductsSearch($conditions = null, $limit = null, $page = null)  {
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
			'Users' => function ($q) {
				return $q->autoFields(false)->select(['id','username']);
			},
			'Images' => function ($q) {
				return $q->autoFields(false)->select(['id','product_id','path','thumbnail']);
			}
			])->where($conditions)->limit($lm)->page($pg)->order(['Products.created' => 'DESC'])->first();
		return $products;
	}

	public function CountProducts($conditions = null)  {
		$Product = TableRegistry::get('Products');
		$products = $Product->find()->where($conditions)->count();
		return $products;
	}

	public function MaxSKU() {
		$Product = TableRegistry::get('Products');
		$max_sku = $Product->find()->select(['sku'])->order(['created' => 'desc'])->first();
		$max_sku = $max_sku->sku+1;
		return $max_sku;
	}

	 public function getInfoSearch($conditions = null, $conditions2 = null) {
		$Product    = TableRegistry::get('Products');
		$products   = $Product->find()->contain([
			'Images' => function($q){
				return $q->select(['id','product_id','path','thumbnail']);
			}])
			->select(['Products.id','Products.sku','Products.product_name'])
			->order(['Products.created' => 'DESC'])
			->Where([$conditions])
			->orWhere($conditions2);
		return $products;
	}

	public function SearchInfo($user_id, $conditions = null){
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute('
			SELECT id, sku, user_id, product_name, retail_price,origin, serial_no, type_model, actived, created 
			FROM  products  
			WHERE user_id = '.$user_id.' '.$conditions.' ORDER by created DESC');
		$results = $stmt ->fetchAll('assoc');
		return $results;
	}
}
