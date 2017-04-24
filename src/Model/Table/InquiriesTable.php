<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;


/**
 * Inquiries Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $InquirieProducts
 *
 * @method \App\Model\Entity\Inquiry get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inquiry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Inquiry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inquiry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inquiry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inquiry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inquiry findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class InquiriesTable extends Table
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

		$this->table('inquiries');
		$this->displayField('id');
		$this->primaryKey('id');

		$this->addBehavior('Timestamp');

		$this->belongsTo('Users', [
			'foreignKey' => 'user_id'
		]);
		$this->belongsTo('Customers', [
			'foreignKey' => 'customer_id'
		]);
		$this->hasMany('InquirieProducts', [
			'foreignKey' => 'inquiry_id'
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
			->integer('id')      ->allowEmpty('id', 'create');
		$validator
			->requirePresence('status', 'create')            ->notEmpty('status');
		$validator
			->integer('type')      ->allowEmpty('type');
		$validator
	  ->allowEmpty('vessel');
		$validator
	  ->allowEmpty('imo_no');
		$validator
	  ->allowEmpty('ref');
		$validator
			->integer('discount')      ->allowEmpty('discount');
		$validator
			->decimal('profit')      ->allowEmpty('profit');
		$validator
			->decimal('delivery_cost')      ->allowEmpty('delivery_cost');
		$validator
			->decimal('packing_cost')      ->allowEmpty('packing_cost');
		$validator
			->decimal('insurance_cost')      ->allowEmpty('insurance_cost');
		$validator
	  ->allowEmpty('description');
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
		$rules->add($rules->existsIn(['customer_id'], 'Customers'));

		return $rules;
	}

	public function getInfo($id) {
		$Inq = TableRegistry::get('Inquiries');
		$inquiries = $Inq->get($id, [
			'contain' => [
				'Users' => function ($q) {
					return $q->autoFields(false)->select(['id','username','fullname']);
				},
				'InquirieProducts' => function ($q) {
					return $q->autoFields(false)->select(['InquirieProducts.id','InquirieProducts.price','InquirieProducts.no','InquirieProducts.status','InquirieProducts.name','InquirieProducts.partno','InquirieProducts.assign','InquirieProducts.unit','InquirieProducts.maker_type_ref','InquirieProducts.amount','InquirieProducts.quantity','InquirieProducts.price','InquirieProducts.remark','InquirieProducts.product_id','InquirieProducts.inquiry_id','products.id','products.sku','products.product_name','products.serial_no','products.type_model','products.origin','products.unit','products.retail_price','products.user_id','categories.id','categories.name'])
					->leftJoin('products','products.id = InquirieProducts.product_id')
					->leftJoin('categories', 'categories.id = products.categorie_id')
					->order(['InquirieProducts.created' => 'desc']);
					// ->leftJoin('Users', 'Users.id = Products.user_id')  
					// ->where(['Products.user_id' => $this->Auth->user('id')]);
				}
			],
			'fields' => ['Inquiries.id','Inquiries.pic_id','Inquiries.status','Inquiries.type','Inquiries.vessel','Inquiries.imo_no','Inquiries.hull_no','Inquiries.ref','Inquiries.description','Inquiries.created']
		]);
		return $inquiries;
	}

	public function saveInq($data) {
		$Inq = TableRegistry::get('Inquiries');
		$inquiry = $Inq->newEntity();
		$inquiry = $Inq->patchEntity($inquiry, $data);
		$Inq->save($inquiry);
		return $inquiry->id;
	}

	public function saveInqSupProd($data) {
		$InquirieProduct = TableRegistry::get('InquirieProducts');
		$InqSupProd = TableRegistry::get('inquirie_supplier_products');
		$entities = $InqSupProd->newEntities($data);
		$result = $InqSupProd->saveMany($entities);
		if ($result) {
			foreach ($data as $key => $inquirieproduct) {
				$InquirieProduct->updateAll(['assign' => 1 ], ['id' => $inquirieproduct['inquirie_product_id']]);
			}
			return true;
		}
		
	}

	public function saveInqProduct($data) {
		// $InquirieProduct = TableRegistry::get('InquirieProducts');
		// $inquirieproduct = $InquirieProduct->newEntity();
		// $inquirieproduct = $InquirieProduct->patchEntity($inquirieproduct, $data);
		// $InquirieProduct->save($inquirieproduct);
		// return true;
		$InquirieProduct = TableRegistry::get('InquirieProducts');
		$entities = $InquirieProduct->newEntities($data);
		$result = $InquirieProduct->saveMany($entities);
		return true;
	}

	public function InquirieSupplierInfo($id)	{
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		$inqSuppliers = $InquirieSupplier->find()->contain([
			'Inquiries' => function ($q) {
				return $q->autoFields(false)->select(['id','vessel','hull_no','imo_no','ref','created']);
			}, 
			'Suppliers' => function ($q) {
				return $q->autoFields(false)->select(['id','name']);
			},
			'Users' => function ($q) {
				return $q->autoFields(false)->select(['id','username']);
			},
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_supplier_id','InquirieSupplierProducts.price','InquirieSupplierProducts.delivery_time','InquirieSupplierProducts.remark','inquirie_products.id','inquirie_products.name','inquirie_products.partno','inquirie_products.no','inquirie_products.maker_type_ref','inquirie_products.unit','inquirie_products.quantity','inquirie_products.remark'])
				->leftJoin('inquirie_products','inquirie_products.id = InquirieSupplierProducts.inquirie_product_id');
			}
		])->select(['id','remark','created'])->where(['inquirie_suppliers.id' => $id])->first();

		return $inqSuppliers;
	}

	public function query1($id)	{
		$Inquirie = TableRegistry::get('inquiries');
		$inquiries = $Inquirie->find()
			// ->join([
			// 	'Pic' => [
			// 		'table' => 'users',
			// 		'alias' => 'PicID',
			// 		'conditions' => 'inquiries.pic_id = PicID.id'
			// 	]
			// ])
			->contain([
				'Users' => function ($q) {
					return $q->autoFields(false)->select(['id','username','fullname']);
				},
				'InquirieProducts' => function ($q) {
					return $q->autoFields(false)->select(['id','inquiry_id','name','partno','maker_type_ref','unit','quantity','no','remark'])->contain([
						'InquirieSupplierProducts' => function ($q) {
							return $q->autoFields(false)
							->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_product_id','InquirieSupplierProducts.inquirie_supplier_id','InquirieSupplierProducts.price','InquirieSupplierProducts.delivery_time','InquirieSupplierProducts.choose','InquirieSupplierProducts.remark','suppliers.name'])
							->leftJoin('inquirie_suppliers','inquirie_suppliers.id = InquirieSupplierProducts.inquirie_supplier_id')
							->leftJoin('suppliers','suppliers.id = inquirie_suppliers.supplier_id')
							->where(['InquirieSupplierProducts.choose' => 1]);
						}]);
				}
		])->select(['id','user_id','status','type','vessel','imo_no','hull_no','ref','description','created'
			// ,'PicID.id','PicID.username'
		])
		->where(['inquiries.id'=>$id])->first();
		return $inquiries;
	}

	public function query2($id)	{
		$InquirieProduct = TableRegistry::get('inquirie_products');
		$inquiryproducts = $InquirieProduct->find()->select(['id','name','no'])->contain([
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_product_id','InquirieSupplierProducts.inquirie_supplier_id','InquirieSupplierProducts.price','InquirieSupplierProducts.delivery_time','InquirieSupplierProducts.choose']);
			}])->where(['inquiry_id' => $id,'level' => 1])->toarray();
		return $inquiryproducts;
	}

	public function query3($id)	{
		# code...
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		$inqSuppliers = $InquirieSupplier->find()->contain([
			'Suppliers' => function ($q) {
				return $q->autoFields(false)->select(['id','name']);
			},
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_product_id','InquirieSupplierProducts.inquirie_supplier_id','InquirieSupplierProducts.price','InquirieSupplierProducts.choose']);
			}
		])->select(['id','inquiry_id', 'supplier_id', 'remark' ])->where(['inquiry_id' => $id])->toarray();	
		return $inqSuppliers;
	}

	public function query4($id)	{
		# code...
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		$query = $InquirieSupplier->find()->contain([
			'Suppliers' => function ($q) {
				return $q->autoFields(false)->select(['id','name']);
			},
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_supplier_id','InquirieSupplierProducts.price','inquirie_products.id','inquirie_products.name'])
				->leftJoin('inquirie_products','inquirie_products.id = InquirieSupplierProducts.inquirie_product_id');
			}
			])->where(['inquiry_id' => $id])->toarray();
		return $query;
	}

	public function query5($id)	{
		# code...
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		$query = $InquirieSupplier->find()->contain([
			'Suppliers' => function ($q) {
				return $q->autoFields(false)->select(['id','name']);
			},
			'Users' => function ($q) {
				return $q->autoFields(false)->select(['id','username']);
			},
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_supplier_id','InquirieSupplierProducts.price','inquirie_products.id','inquirie_products.name','inquirie_products.partno','inquirie_products.no','inquirie_products.maker_type_ref','inquirie_products.unit','inquirie_products.quantity','inquirie_products.remark'])
				->leftJoin('inquirie_products','inquirie_products.id = InquirieSupplierProducts.inquirie_product_id');
			}
		])->where(['inquirie_suppliers.id' => $id])->first();
		return $query;
	}

	public function query6($id)	{
		## get min price
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute('SELECT t2.id FROM inquirie_products as t3 INNER JOIN ( SELECT t1.id, t1.price, t1.inquirie_product_id FROM inquirie_supplier_products as t1 INNER JOIN( SELECT inquirie_product_id,choose,MIN(price) as minVal FROM inquirie_supplier_products GROUP BY inquirie_product_id ) as t2 ON t1.price = t2.minVal GROUP BY t1.inquirie_product_id ) t2 ON t3.id = t2.inquirie_product_id WHERE t3.inquiry_id = '.$id);
		$results = $stmt ->fetchAll('assoc');
		$IngSupProd = TableRegistry::get('inquirie_supplier_products');
		$flag = true;
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		$inquirie_suppliers = $InquirieSupplier->find()->contain([
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_supplier_id']);
			}
		])->select(['id'])->where(['inquiry_id' => $id]);
		foreach ($inquirie_suppliers as $key => $inquirie_supplier) {
			foreach ($inquirie_supplier->inquirie_supplier_products as $key => $is) {
				$update = $IngSupProd->updateAll(['choose'=>0],['id'=>$is->id]);
			}
		}
		foreach ($results as $key => $value) {
			$update = $IngSupProd->updateAll(['choose'=>1],['id'=>$value['id']]);
			if (!$update) {
				$flag = false;
			}
		}
		return $flag;
	}

	public function query7($id)	{
		## get max price
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute('SELECT t2.id FROM inquirie_products as t3 INNER JOIN ( SELECT t1.id, t1.price, t1.inquirie_product_id FROM inquirie_supplier_products as t1 INNER JOIN( SELECT inquirie_product_id,choose,max(price) as minVal FROM inquirie_supplier_products GROUP BY inquirie_product_id ) as t2 ON t1.price = t2.minVal GROUP BY t1.inquirie_product_id ) t2 ON t3.id = t2.inquirie_product_id WHERE t3.inquiry_id = '.$id);
		$results = $stmt ->fetchAll('assoc');
		$IngSupProd = TableRegistry::get('inquirie_supplier_products');
		$flag = true;
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		$inquirie_suppliers = $InquirieSupplier->find()->contain([
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_supplier_id']);
				
			}
		])->select(['id'])->where(['inquiry_id' => $id]);
		foreach ($inquirie_suppliers as $key => $inquirie_supplier) {
			foreach ($inquirie_supplier->inquirie_supplier_products as $key => $is) {
				$update = $IngSupProd->updateAll(['choose'=>0],['id'=>$is->id]);
			}
		}
		foreach ($results as $key => $value) {
			$update = $IngSupProd->updateAll(['choose'=>1],['id'=>$value['id']]);
			if (!$update) {
				$flag = false;
			}
		}
		return $flag;
	}

	public function query8($inquiry_id,$id)	{
		## get max price
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		$IngSupProd = TableRegistry::get('inquirie_supplier_products');
		$flag = true;
		$results = $InquirieSupplier->find()->contain([
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_supplier_id']);
			}
		])->select(['id'])->where(['inquiry_id' => $inquiry_id, 'supplier_id' => $id])->first();

		$inquirie_suppliers = $InquirieSupplier->find()->contain([
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_supplier_id']);
				
			}
		])->select(['id'])->where(['inquiry_id' => $inquiry_id]);
		foreach ($inquirie_suppliers as $key => $inquirie_supplier) {
			foreach ($inquirie_supplier->inquirie_supplier_products as $key => $is) {
				$update = $IngSupProd->updateAll(['choose'=>0],['id'=>$is->id]);
			}
		}
		foreach ($results->inquirie_supplier_products as $key => $value) {
			$update = $IngSupProd->updateAll(['choose'=>1],['id'=>$value['id']]);
			if (!$update) {
				$flag = false;
			}
		}
		return $flag;
	}
	############ FUNCTION ###############
	public function func1($n, $m,$inquiry_id, $inqsupp_id)	{
		## Comment: 
		$InquirieProduct = TableRegistry::get('inquirie_products');
		$InqSupProd = TableRegistry::get('inquirie_supplier_products');
		$data = array();
		if (isset($n)) {
			$num = explode(',', $n);
			for ($i=0; $i <count($num) ; $i++) { 
				$inqProd = $InquirieProduct->find()->select(['id'])->where(['inquiry_id' => $inquiry_id, 'no' => trim($num[$i])])->first();
				if (!$InqSupProd->exists(['inquirie_supplier_id' => $inqsupp_id, 'inquirie_product_id' => $inqProd->id])) {
					$data[$i]['inquirie_supplier_id'] = $inqsupp_id;
					$data[$i]['inquirie_product_id']  = $inqProd->id;
				}
			}
		} else {
			$inqProducts = $InquirieProduct->find('list')->where(['inquiry_id' => $inquiry_id, 'parent' => $m]);
			foreach ($inqProducts as $key => $inqProduct) {
				if (!$InqSupProd->exists(['inquirie_supplier_id' => $inqsupp_id, 'inquirie_product_id' => $key])) {
					$data[$key]['inquirie_supplier_id'] = $inqsupp_id;
					$data[$key]['inquirie_product_id']  = $key;
				}
			}
		}
		return $data;
	}
}
