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
		
		$this->hasMany('InquirieSuppliers', [
			'dependent' => true,
			'foreignKey' => 'inquiry_id'
		]);
		$this->hasMany('InquirieProducts', [
			'dependent' => true,
			'foreignKey' => 'inquiry_id'
		]);
		$this->hasMany('Attachments', [
			'dependent' => true,
			'foreignKey' => 'inquiry_id'
		]);
		$this->hasMany('Extras', [
			'dependent' => true,
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
			->integer('id')
			->allowEmpty('id', 'create');
		$validator
			->requirePresence('status', 'create')
			->notEmpty('status');
		$validator
			->integer('type')
			->allowEmpty('type');
		$validator
			->allowEmpty('vessel');
		$validator
			->allowEmpty('imo_no');
		$validator
			->allowEmpty('ref');
		$validator
			->integer('discount')
			->allowEmpty('discount');
		$validator
			->decimal('profit')
			->allowEmpty('profit');
		$validator
			->decimal('delivery_cost')
			->allowEmpty('delivery_cost');
		$validator
			->decimal('packing_cost')
			->allowEmpty('packing_cost');
		$validator
			->decimal('insurance_cost')
			->allowEmpty('insurance_cost');
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
				'Attachments' => function ($q) {
					return $q->autoFields(false)->select(['id','inquiry_id','path']);
				},
				'Users' => function ($q) {
					return $q->autoFields(false)->select(['id','username','fullname']);
				},
				'InquirieProducts' => function ($q) {
					return $q->autoFields(false)->select(['InquirieProducts.id','InquirieProducts.price','InquirieProducts.no','InquirieProducts.status','InquirieProducts.name','InquirieProducts.partno','InquirieProducts.assign','InquirieProducts.unit','InquirieProducts.maker_type_ref','InquirieProducts.amount','InquirieProducts.quantity','InquirieProducts.price','InquirieProducts.remark','InquirieProducts.product_id','InquirieProducts.inquiry_id','products.id','products.sku','products.product_name','products.serial_no','products.type_model','products.origin','products.unit','products.retail_price','products.user_id','categories.id','categories.name'])
					->leftJoin('products','products.id = InquirieProducts.product_id')
					->leftJoin('categories', 'categories.id = products.categorie_id')
					->order(['InquirieProducts.id' => 'asc']);
					// ->leftJoin('Users', 'Users.id = Products.user_id')  
					// ->where(['Products.user_id' => $this->Auth->user('id')]);
				}
			],
			'fields' => ['Inquiries.id','Inquiries.pic_id','Inquiries.status','Inquiries.type','Inquiries.vessel','Inquiries.imo_no','Inquiries.hull_no','Inquiries.ref','Inquiries.description','Inquiries.created']
		]);
		return $inquiries;
	}

	public function available($id)  {
		
		$Inq = TableRegistry::get('Inquiries');
		$inquiries = $Inq->get($id, [
			'contain' => [
				'Attachments' => function ($q) {
					return $q->autoFields(false)->select(['id','inquiry_id','path']);
				},
				'Extras' => function ($q) {
					return $q->autoFields(false)->select(['id','inquiry_id','name','cost','profit','final']);
				},
				'InquirieProducts' => function ($q) {
					return $q->autoFields(false)->select(['InquirieProducts.id','InquirieProducts.price','InquirieProducts.profit','InquirieProducts.status','InquirieProducts.name','InquirieProducts.partno','InquirieProducts.assign','InquirieProducts.unit','InquirieProducts.maker_type_ref','InquirieProducts.amount','InquirieProducts.quantity','InquirieProducts.remark','InquirieProducts.product_id','InquirieProducts.inquiry_id','products.id','products.sku','products.product_name','products.serial_no','products.type_model','products.origin','products.unit','products.retail_price','products.user_id','users.username'])
					->leftJoin('products','products.id = InquirieProducts.product_id')
					->leftJoin('users', 'users.id = Products.user_id')  
					->order(['InquirieProducts.created' => 'asc']);
				}
			],
			'fields' => ['id','user_id','status','type','vessel','imo_no','hull_no','ref','description','scope_of_supply','delivery_terms','terms_of_payment','discount','commission','add_commission','others','quotation_date','delivery_time','validity_of_the_offer','remark','created']
		]);
		return $inquiries;
		// return $inquiries;
	}

	public function unavailable($id) {
		$Inquirie = TableRegistry::get('inquiries');
		$inquiries = $Inquirie->find()
			->contain([
				'Attachments' => function ($q) {
					return $q->autoFields(false)->select(['id','inquiry_id','path']);
				},
				'Extras' => function ($q) {
					return $q->autoFields(false)->select(['id','inquiry_id','name','cost','profit','final']);
				},
				'InquirieProducts' => function ($q) {
					return $q->autoFields(false)->select(['id','inquiry_id','name','partno','maker_type_ref','unit','quantity','profit','no','remark'])->contain([
						'InquirieSupplierProducts' => function ($q) {
							return $q->autoFields(false)
							->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_product_id','InquirieSupplierProducts.inquirie_supplier_id','InquirieSupplierProducts.price','InquirieSupplierProducts.delivery_time','InquirieSupplierProducts.choose','InquirieSupplierProducts.remark','suppliers.name'])
							->leftJoin('inquirie_suppliers','inquirie_suppliers.id = InquirieSupplierProducts.inquirie_supplier_id')
							->leftJoin('suppliers','suppliers.id = inquirie_suppliers.supplier_id')
							->where(['InquirieSupplierProducts.choose' => 1]);
						}]);
				}
		])->select(['id','user_id','status','type','vessel','imo_no','hull_no','ref','description','scope_of_supply','delivery_terms','terms_of_payment','discount','commission','add_commission','others','quotation_date','delivery_time','validity_of_the_offer','remark','created'
		])
		->where(['inquiries.id'=>$id])->first();
		// pr($inquiries);die();
		return $inquiries;
	}

	public function get_total_available($id){
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute('SELECT I.discount, SUM((P.retail_price + ((P.retail_price*IP.profit)/100))*IP.quantity) as Total
			FROM `inquiries` as I
			LEFT JOIN `inquirie_products` as IP ON I.id = IP.inquiry_id
			LEFT JOIN `products` as P ON P.id = IP.product_id
			WHERE I.id = '.$id);
		$results = $stmt ->fetchAll('assoc');
		$discount = ($results[0]['Total']*$results[0]['discount'])/100; 
		$arr = array('Total' => $results[0]['Total'],'discount'=>$discount);
		return $arr;
	}

	public function get_total_unavailable($id){
		$Inquirie = TableRegistry::get('inquiries');
		$inquiries = $Inquirie->find()
			->contain([
				'InquirieProducts' => function ($q) {
					return $q->autoFields(false)->select(['id','inquiry_id','quantity','profit'])->contain([
						'InquirieSupplierProducts' => function ($q) {
							return $q->autoFields(false)
							->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_product_id','InquirieSupplierProducts.price'])
							->where(['InquirieSupplierProducts.choose' => 1]);
						}])->where(['InquirieProducts.level !='=>'0']);
				}
		])->select(['id','discount'])
		->where(['inquiries.id'=>$id])->first();
		$total = 0;
		foreach ($inquiries['inquirie_products'] as $key => $inquirie_product) {
			$profit = $inquirie_product->profit;
			$quantity = $inquirie_product->quantity;
			$price = $inquirie_product->inquirie_supplier_products[0]['price'];
			$total = $total + (($price + ($price*$profit)/100)*$quantity);
		}
		$discount = ($total*$inquiries->discount)/100;
		$arr = array('Total' => $total,'discount'=>$discount);
		return $arr;
		
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
		} else { 
			return false;
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

	public function saveInqAttachments($data) {
		$attachments = TableRegistry::get('attachments');
		$entities = $attachments->newEntities($data);
		$result = $attachments->saveMany($entities);
		
		return true;
	}

	public function InquirieSupplierInfo($id)   {
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
				->leftJoin('inquirie_products','inquirie_products.id = InquirieSupplierProducts.inquirie_product_id')
				->order(['inquirie_products.id' => 'asc']);
			}
		])->select(['id','supplier_ref','delivery_terms','payment_terms','currency','remark','created'])
		->where(['inquirie_suppliers.id' => $id])->first();
		// pr($inqSuppliers);die();
		return $inqSuppliers;
	}

	public function UpdateData($data)   {
		$Inquirie = TableRegistry::get('inquiries');
		$inquiry = $Inquirie->get($data['id'], [ 'contain' => [] ]);
		$inquiry = $Inquirie->patchEntity($inquiry, $data);
		if($Inquirie->save($inquiry)){
			return true;
		} else {
			return false;
		}
	}
	
	public function UpdateInquiriesProducts($id, $data) {
		$InquirieProduct = TableRegistry::get('InquirieProducts');
		$inquiryproducts = $InquirieProduct->get($id, [
			'contain' => []
		]);
		$inquiryproducts = $InquirieProduct->patchEntity($inquiryproducts, $data);
		if ($InquirieProduct->save($inquiryproducts)) {
			return $inquiryproducts->inquiry_id;
		} else {
			return $inquiryproducts->inquiry_id;
		}
	}

	public function query1($id) {
		$Inquirie = TableRegistry::get('inquiries');
		$inquiries = $Inquirie->find()
			->join([
		        'table' => 'Users',
		        'alias' => 'Pic',
		        'type' => 'LEFT',
		        'conditions' => 'inquiries.pic_id = Pic.id',
		    ])
			->contain([
				'Users' => function ($q) {
					return $q->autoFields(false)->select(['id','username','fullname']);
				},
				'Extras' => function ($q) {
					return $q->autoFields(false)->select(['id','inquiry_id','name','cost','profit','final']);
				},
				'InquirieProducts' => function ($q) {
					return $q->autoFields(false)->select(['id','inquiry_id','name','partno','maker_type_ref','unit','quantity','profit','no','remark'])->contain([
						'InquirieSupplierProducts' => function ($q) {
							return $q->autoFields(false)
							->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_product_id','InquirieSupplierProducts.inquirie_supplier_id','InquirieSupplierProducts.price','InquirieSupplierProducts.delivery_time','InquirieSupplierProducts.choose','InquirieSupplierProducts.remark','suppliers.name'])
							->leftJoin('inquirie_suppliers','inquirie_suppliers.id = InquirieSupplierProducts.inquirie_supplier_id')
							->leftJoin('suppliers','suppliers.id = inquirie_suppliers.supplier_id')
							->where(['InquirieSupplierProducts.choose' => 1]);
						}])->where(['level' => 1]);
				}
			])
			->select(['id','user_id','pic_id','status','type','vessel','imo_no','hull_no','ref','description','scope_of_supply','delivery_terms','terms_of_payment','discount','commission','add_commission','others','quotation_date','delivery_time','validity_of_the_offer','remark','created','Pic.username','Pic.fullname'
			])
			->where(['inquiries.id'=>$id])->first();
		
		return $inquiries;
	}

	public function query2($id) {
		$InquirieProduct = TableRegistry::get('inquirie_products');
		$inquiryproducts = $InquirieProduct->find()->select(['id','name','no'])->contain([
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_product_id','InquirieSupplierProducts.inquirie_supplier_id','InquirieSupplierProducts.price','InquirieSupplierProducts.delivery_time','InquirieSupplierProducts.choose']);
			}])->where(['inquiry_id' => $id,'level' => 1])->toarray();
		return $inquiryproducts;
	}

	public function query3($id) {
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

	public function query4($id) {
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

	public function query5($id) {
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

	public function query6($id) {
		## get min price
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute('SELECT t3.id,t3.price FROM `inquirie_products` t4 INNER JOIN( SELECT t1.id,t1.inquirie_product_id,t1.price FROM `inquirie_supplier_products` t1 INNER JOIN ( SELECT inquirie_product_id, min(price) as minprice FROM inquirie_supplier_products Group BY inquirie_product_id ) t2 ON t2.minprice = t1.price and t2.inquirie_product_id = t1.inquirie_product_id ) t3 ON t4.id = t3.inquirie_product_id WHERE inquiry_id = '.$id);
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
			if (!empty($value['id'])) {
				
				$update = $IngSupProd->updateAll(['choose'=>1],['id'=>$value['id']]);
				if (!$update) {
					$flag = false;
				}
			}           
		}
		return $flag;
	}

	public function query7($id) {
		## get max price
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute('SELECT t3.id,t3.price FROM `inquirie_products` t4 INNER JOIN( SELECT t1.id,t1.inquirie_product_id,t1.price FROM `inquirie_supplier_products` t1 INNER JOIN ( SELECT inquirie_product_id, max(price) as minprice FROM inquirie_supplier_products Group BY inquirie_product_id ) t2 ON t2.minprice = t1.price and t2.inquirie_product_id = t1.inquirie_product_id ) t3 ON t4.id = t3.inquirie_product_id WHERE inquiry_id = '.$id);
		$results = $stmt ->fetchAll('assoc');
		$IngSupProd = TableRegistry::get('inquirie_supplier_products');
		$flag = true;
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		$inquirie_suppliers = $InquirieSupplier->find()->contain([
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_supplier_id']);
			}
		])->select(['id'])->where(['inquiry_id' => $id]);
		// pr($results);
		// die();
		foreach ($inquirie_suppliers as $key => $inquirie_supplier) {
			foreach ($inquirie_supplier->inquirie_supplier_products as $key => $is) {
				$update = $IngSupProd->updateAll(['choose'=> null],['id'=>$is->id]);
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

	public function query8($inquiry_id,$id) {
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

	public function query9($id) {
		$Inq = TableRegistry::get('Inquiries');

		$inquiries = $Inq->get($id, [
			'contain' => [
				'Extras' => function ($q) {
					return $q->autoFields(false)->select(['id','inquiry_id','name','cost','profit','final']);
				},
				'Users' => function ($q) {
					return $q->autoFields(false)->select(['id','username','fullname']);
				},
				'InquirieProducts' => function ($q) {
					return $q->autoFields(false)->select(['InquirieProducts.id','InquirieProducts.price','InquirieProducts.profit','InquirieProducts.status','InquirieProducts.name','InquirieProducts.partno','InquirieProducts.assign','InquirieProducts.unit','InquirieProducts.maker_type_ref','InquirieProducts.amount','InquirieProducts.quantity','InquirieProducts.remark','InquirieProducts.product_id','InquirieProducts.inquiry_id','products.id','products.sku','products.product_name','products.serial_no','products.type_model','products.origin','products.unit','products.retail_price','products.user_id','users.username'])
					->leftJoin('products','products.id = InquirieProducts.product_id')
					->leftJoin('users', 'users.id = Products.user_id')  
					->order(['InquirieProducts.created' => 'asc']);
				}
			],
			'join' => [
				'table' => 'users',
				'alias' => 'Pic',
				'conditions' => ['Inquiries.pic_id = Pic.id']
			],
			'fields' => ['Inquiries.id','Inquiries.user_id','Inquiries.pic_id','Inquiries.status','Inquiries.type','Inquiries.vessel','Inquiries.imo_no','Inquiries.hull_no','Inquiries.ref','Inquiries.description','Inquiries.scope_of_supply','Inquiries.delivery_terms','Inquiries.terms_of_payment','Inquiries.discount','Inquiries.commission','Inquiries.add_commission','Inquiries.others','Inquiries.quotation_date','Inquiries.delivery_time','Inquiries.validity_of_the_offer','Inquiries.remark','Inquiries.created','Pic.id','Pic.username','Pic.fullname']
		]);
			pr($inquiries);die("12444");
		return $inquiries;
	}

	public function SumPrice($id)   {
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		$inqSupps = $InquirieSupplier->find()->select(['inquiry_id','supplier_id'])->where(['id' => $id])->first();
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute(
			"SELECT SUM(inquirie_products.quantity * inquirie_supplier_products.price) AS grand_total
			FROM `inquirie_suppliers` 
			Inner JOIN inquirie_supplier_products ON inquirie_supplier_products.inquirie_supplier_id = inquirie_suppliers.id 
			Inner JOIN inquirie_products ON inquirie_products.id = inquirie_supplier_products.inquirie_product_id
			WHERE `inquirie_suppliers`.`inquiry_id` = ".$inqSupps->inquiry_id." and `inquirie_suppliers`.`supplier_id` = ".$inqSupps->supplier_id
		);
		$results = $stmt ->fetchAll('assoc');
	
		return $results[0]['grand_total'];
	}

	public function query10($inqSupp_id= NULL)    {
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		$InquirieProduct = TableRegistry::get('inquirie_products');
		$info = $InquirieSupplier->find()
			// ->join([
		 //        'table' => 'inquirie_products',
		 //        'alias' => 'IP',
		 //        'type' => 'LEFT',
		 //        'conditions' => 'inquirie_suppliers.inquiry_id = IP.id',
		 //    ])
			->contain([
				'Suppliers' => function ($q) {
					return $q->autoFields(false)->select(['id','name']);
				},
				'Users' => function ($q) {
					return $q->autoFields(false)->select(['id','username']);
				},
			])->select(['id','inquiry_id','created'])
			->where(['inquirie_suppliers.id'=> $inqSupp_id])->first();
			$count = $InquirieProduct->find()->where(['inquiry_id' => $info->inquiry_id,'level' => 1])->count();	
			$html = '';
			$html .= '
				<tr class="cursor-pointer myrowaxn-'.$info->id.'" id="'.$info->id.'">
					<td class="text-center main"><b>#'.$info->inquiry_id.'</b></td>
					<td class="text-center main">'.$info->supplier['name'].'</td>
					<td class="text-center main">'.$info->user['username'].'</td>
					<td class="text-center main"><span id="count-product-of-supp-'.$info->id.'">0</span>/'.$count.'</td>
					<td class="text-center main" id="supps-total-'.$info->id.'">0.00</td>
					<td class="text-center main"></td>
					<td class="text-center main">'.date_format($info->created,"Y-m-d").'</td>
					<td class="text-center">
						<span class="btn btn-primary DeleteInqSupplier" id="'.$info->id.'"><i class="fa fa-trash"></i></span>
					</td>
				</tr>';
		return $html;
	}

	public function query11($id)    {
		
		$conn = ConnectionManager::get('default');
		$stmt = $conn->execute(
			"SELECT P.user_id, U.username 
			FROM `products` as P 
			LEFT JOIN `users` as U on U.id = P.user_id 
			LEFT JOIN `inquirie_products` as IqS on IqS.product_id = P.id and IqS.inquiry_id = ".$id." GROUP BY P.user_id"
		);
		$results = $stmt ->fetchAll('assoc');
		pr($results);die();
	}
	############ FUNCTION ###############
	public function func1($n, $m,$inquiry_id, $inqsupp_id)  {
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

	public function func2($inquiries){
		$data = ''; $grand_total = 0;
		if (!empty($inquiries)) {
			foreach ($inquiries as $key => $inquirie_product){
				$u_p     = $inquirie_product['products']['retail_price'] + (($inquirie_product['products']['retail_price']*$inquirie_product->profit)/100);
				$f_total = $u_p*$inquirie_product->quantity;
				$grand_total = $grand_total+$f_total;
				$arr[] = $inquirie_product->id; 
				$data[] = [
					"ProductID"      => $inquirie_product->id, 
					"no"             => $key+1,
					"name"           => $inquirie_product['products']['product_name'],
					"unit"           => $inquirie_product['products']['unit'],
					"quantity"       => $inquirie_product->quantity,
					"supplier"       => $inquirie_product['users']['username'],
					"supp_u_p"       => $inquirie_product['products']['retail_price'],
					"supp_u_p_usd"   => '',
					"profit"         => $inquirie_product->profit,
					"u_p"            => $u_p,
					"u_p_usd"        => '',
					"f_total"        => $f_total,
					"f_total_usd"    => '',
					"del_time"       => '',
					"del_time_final" => '',
					"remark"         => ''
				];
			}
		}
		return $data;
	}
}
