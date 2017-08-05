<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;
use Cake\Network\Exception\NotFoundException;
/**
 * Inquiries Controller
 *
 * @property \App\Model\Table\InquiriesTable $Inquiries */
class InquiriesController extends AppController
{

	public function index()	{
		$this->viewBuilder()->layout('product');
		// $this->paginate = [
		// 	'fields' => ['Inquiries.id','Inquiries.status','Inquiries.vessel','Inquiries.ref','Inquiries.type','Inquiries.description','Inquiries.created'],
		// 	'conditions' => ['Inquiries.user_id' => $this->Auth->user('id')],
		// 	'order' => ['Inquiries.created' => 'DESC'],
		// ];
		$inquiries = $this->Inquiries->find()
			->select(['Inquiries.id','Inquiries.status','Inquiries.vessel','Inquiries.ref','Inquiries.type','Inquiries.description','Inquiries.created'])
			->where(['Inquiries.user_id' => $this->Auth->user('id'),'Inquiries.created >'=> date('Y-m-01'),'Inquiries.created <'=> date('Y-m-t')])
			->order(['Inquiries.created'  => 'DESC']);
	
		// $inquiries = $this->paginate($this->Inquiries);
		$this->set(compact('inquiries'));
		$this->set('_serialize', ['inquiries']);
	}

	public function view($id = null){
		$this->viewBuilder()->layout('product');
		$inquiry = $this->Inquiries->getInfo($id);

		$inquiries = $this->Inquiries->available($id);
		$data = ''; $total = 0;
		if (!empty($inquiries->inquirie_products)) {
			foreach ($inquiries->inquirie_products as $inquirie_product){
				if (!empty($inquirie_product->inquirie_supplier_products)) {
					$price = $inquirie_product->inquirie_supplier_products[0]['price']; $remark = $inquirie_product->inquirie_supplier_products[0]['remark']; $final_total = $price*$inquirie_product->quantity;
					$no = $inquirie_product->no; $delivery_time = $inquirie_product->inquirie_supplier_products[0]['delivery_time'];
				}else{
					$no = ''; $price = ''; $delivery_time = ''; $remark = ''; $final_total = '';
				}
				$u_p 	 = $price + (($price*$inquirie_product->profit)/100);
				$f_total = $u_p*$inquirie_product->quantity;
				$data[] = [
					"ProductID" 	=> $inquirie_product->id,
					"no" 			=> $no,
					"name"			=> $inquirie_product->name,
					"maker_type_ref"=> $inquirie_product->maker_type_ref,
					"partno"		=> $inquirie_product->partno,
					"unit"			=> $inquirie_product->unit,
					"quantity"		=> $inquirie_product->quantity,
					"price"			=> $u_p,
					"final_total"	=> $f_total,
					"delivery_time"	=> $delivery_time,
					"remark"		=> $remark
				];
				$total = $total + $f_total;
			}
		}
		$data = json_encode($data);
		$this->set(compact('inquiries','data','total'));

		$this->set('inquiry', $inquiry);
		$this->set('_serialize', ['inquiry']);
	}

	public function InquiriesView($id, $type=null){
		$this->viewBuilder()->layout('product');
		$result		= $this->get_data_kendo_fontend($id);
		$inquiries	= $result['inquiries'];
		$data		= json_encode($result['data']);
		$total		= json_encode($result['total']);
		$this->set(compact('inquiries','data','total'));
	}

	public function InquiriesDetailsCtrl()	{
		$result		= $this->get_data_kendo_fontend($this->request->data['id']);
		$data = array('inquiries' => $result['inquiries'], 'data' => $result['data'], 'total' => $result['total']);
		echo json_encode($data);exit();
	}

	protected function get_data_kendo_fontend($id)	{
		$total = 0;
		if ($this->Inquiries->exists(['id' => $id, 'type' => AVAILABLE])) {
			$inquiries = $this->Inquiries->available($id);
			if (!empty($inquiries->inquirie_products)) {
				foreach ($inquiries->inquirie_products as $key => $inquirie_product){
					$u_p = $inquirie_product['products']['retail_price'] + (($inquirie_product['products']['retail_price']*$inquirie_product->profit)/100);
					$f_total = $u_p*$inquirie_product->quantity;
					$arr[] = $inquirie_product->id;
					$data[] = [
						"ProductID"		 => $inquirie_product->id,
						"choose" 		 => NULL,
						"no" 			 => $key+1,
						"name"			 => $inquirie_product['products']['product_name'],
						"maker_type_ref" => '',
						"partno"		 => $inquirie_product['products']['serial_no'],
						"unit"			 => $inquirie_product['products']['unit'],
						"quantity"		 => $inquirie_product->quantity,
						"price"			 => $u_p,
						"final_total"	 => $f_total,
						"delivery_time"	 => '',
						"remark"		 => $inquirie_product->remark
					];
					$total = $total+$f_total;
				}
			}
			
		} else { ## No Price
			
			$inquiries = $this->Inquiries->unavailable($id);

			if (!empty($inquiries->inquirie_products)) {
				foreach ($inquiries->inquirie_products as $inquirie_product){
					if (!empty($inquirie_product->inquirie_supplier_products)) {
						$price 			= $inquirie_product->inquirie_supplier_products[0]['price']; 
						$remark 		= $inquirie_product->remark; 
						$final_total 	= $price*$inquirie_product->quantity; $no = $inquirie_product->no; 
						$delivery_time 	= $inquirie_product->inquirie_supplier_products[0]['delivery_time'];	
					}else{
						$no = ''; $price = ''; $delivery_time = ''; $remark = ''; $final_total = '';
					}
					if ($inquirie_product->no == 0) {
						$no 	 = NULL;
						$u_p 	 = NULL;
						$f_total = NULL;
					} else {
						if ($price == null) {
							$u_p = null; $f_total = NULL;
						}else {
							$u_p 	 = $price + (($price*$inquirie_product->profit)/100);
							$f_total = $u_p*$inquirie_product->quantity;
						}
						$no 	 = $inquirie_product->no;
					}

					$data[] = [
						"ProductID" 	=> $inquirie_product->id,
						"choose" 		=> NULL,
						"no" 			=> $no,
						"name"			=> $inquirie_product->name,
						"maker_type_ref"=> $inquirie_product->maker_type_ref,
						"partno"		=> $inquirie_product->partno,
						"unit"			=> $inquirie_product->unit,
						"quantity"		=> $inquirie_product->quantity,
						"price"			=> $u_p,
						"final_total"	=> $f_total,
						"delivery_time"	=> $delivery_time,
						"remark"		=> $remark
					];
					$total = $total + $f_total;

				}
			} //end if

		}
		$arr = array('inquiries' => $inquiries, 'data' => $data, 'total' => $total);
		return $arr;
	}

	public function add() {
		$this->viewBuilder()->layout('product');
		// $inquiry = $this->Inquiries->newEntity();
		// if ($this->request->is('post')) {
		//     $inquiry = $this->Inquiries->patchEntity($inquiry, $this->request->data);
		//     if ($this->Inquiries->save($inquiry)) {
		//         $this->Flash->success(__('The inquiry has been saved.'));
		//         return $this->redirect(['action' => 'index']);
		//     } else {
		//         $this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
		//     }
		// }
		// $users = $this->Inquiries->Users->find('list', ['limit' => 200]);
		// $customers = $this->Inquiries->Customers->find('list', ['limit' => 200]);
		// $this->set(compact('inquiry', 'users', 'customers'));
		// $this->set('_serialize', ['inquiry']); 
	}

	public function edit($id = null)	{
		
		$inquiry = $this->Inquiries->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$inquiry = $this->Inquiries->patchEntity($inquiry, $this->request->data);
			if ($this->Inquiries->save($inquiry)) {
				return $this->redirect($this->request->referer());
			} else {
				// $this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
			}
		}
		$users = $this->Inquiries->Users->find('list', ['limit' => 200]);
		$customers = $this->Inquiries->Customers->find('list', ['limit' => 200]);
		$this->set(compact('inquiry', 'users', 'customers'));
		$this->set('_serialize', ['inquiry']);
	}

	public function delete($id = null)	{
		$this->request->allowMethod(['post', 'delete']);
		$inquiry = $this->Inquiries->get($id);
		if ($this->Inquiries->delete($inquiry)) {
			// $this->Flash->success(__('The inquiry has been deleted.'));
		} else {
			$this->Flash->error(__('The inquiry could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'inquiries']);
	}

	public function deleteinquiry()	{
		$this->request->allowMethod(['post', 'delete']);
		$inquiry = $this->Inquiries->get($this->request->data);
		if ($this->Inquiries->delete($inquiry)) {
			$msg = array('status' => true, 'message' => __('The inquiry has been deleted.'));
		} else {
			$msg = array('status' => false, 'message' => __('The inquiry could not be deleted. Please, try again.'));
		}
		echo json_encode($msg);exit();
	}

	public function MakeInq() {
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$inquiry_id =  $this->request->data['inquiry_id'];
			$i = 1; $parent = 1;
			foreach ($this->request->data['data'] as $key => $inq) {
				if (!empty($inq[0])) {
					$item[$key]['inquiry_id']		= $inquiry_id;
					$item[$key]['product_id']		= null;
					$item[$key]['name']				= $inq[0];
					$item[$key]['maker_type_ref']	= $inq[1];
					$item[$key]['partno']			= $inq[2];
					$item[$key]['unit']				= $inq[3];
					$item[$key]['quantity']			= $inq[4];
					$item[$key]['remark']			= $inq[5];
					$item[$key]['price']			= null;
					$item[$key]['status']			= true;
					if (!empty($inq[1]) || !empty($inq[2]) || !empty($inq[3]) || !empty($inq[4]) || !empty($inq[5])) {
						$item[$key]['level']	= 1;
						$item[$key]['parent']	= $parent;
						$item[$key]['no']		= $i;
						$i = $i + 1;
					} else {
						$parent = $parent + 1;
						$item[$key]['main'] = $parent;
					}
				} 
			}
			if ($this->Inquiries->saveInqProduct($item)) {
				$this->Flash->success(__('The Inquiries has been saved.'));
			}
			die();
		}
	}	

	public function MakeInquiry() {
		if ($this->request->is('ajax') || $this->request->is('post') ) {
			$this->autoRender = false;
			// pr($this->request->data);die();
			if (empty($this->Auth->user())) {
				$msg = array('status' => false, 'message' => __('You must login before order.'));
				echo json_encode($msg); exit();
			} 
			$data = [
				'status'		=> '1',
				'type'			=> AVAILABLE,
				'user_id'		=> $this->Auth->user('id'),
				'vessel'		=> $this->request->data['vessel'],
				'imo_no'		=> $this->request->data['imo_no'],
				'hull_no'		=> $this->request->data['hull_no'],
				'ref'			=> $this->request->data['ref'],
				'created'		=> $this->request->data['created'],
				'description'	=> $this->request->data['description']
			];
			if (!empty($this->Auth->user('id'))) {
				$inquiry_id =  $this->Inquiries->saveInq($data);
				foreach ($this->request->data['products'] as $key => $inq) {
					$inq['inquiry_id']	= $inquiry_id;
					$inq['no'] 			= $key+1;
					$item[$key]			= $inq;
				}
				if ($this->Inquiries->saveInqProduct($item)) {
					$msg = array('status' => true, 'message' => __('OK'));
					$this->request->session()->delete('Cart');
					$this->request->session()->delete('my_cart');
				}else{
					$msg = array('status' => false, 'message' => __('NO.'));
				}
			} else {
				$msg = array('status' => false, 'message' => __('NO.'));
			}
			echo json_encode($msg); exit();
		}
	}

	public function CreateInquiries() {
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			if (!empty($this->Auth->user('id'))) {
				$this->request->data['user_id'] = $this->Auth->user('id');
					$inquiry_id =  $this->Inquiries->saveInq($this->request->data);
					if (!empty($this->request->data['file'][0]['name'])) {
						$flag = true;
						for ($i=0; $i < count($this->request->data['file']) ; $i++) { 
							if(move_uploaded_file($this->request->data['file'][$i]['tmp_name'], FILES.$this->request->data['file'][$i]['name'])){
								$flag = true;
							} else {
								$flag = false;
							}
							$item[$i]['path']		= 'files'.DS.$this->request->data['file'][$i]['name'];
							$item[$i]['filename']	=  $this->request->data['file'][$i]['name'];
							$item[$i]['inquiry_id']	= $inquiry_id;
						}
						$this->Inquiries->saveInqAttachments($item);
						if ($flag) {
							$message = array('status' => true, 'inquiry_id' => $inquiry_id);
							echo json_encode($message); exit();
						} else {
							$message = array('status' => false);
							echo json_encode($message); exit();
						}
					} else {
						$message = array('status' => true, 'inquiry_id' => $inquiry_id);
						echo json_encode($message); exit();
					}
			} else {
				// Login
			}
		}
	}

	public function Inquiries() {
		if ($this->request->is('post')) {
			$ref = $vessel = $imo_no = $hull_no = null;
			if (isset($this->request->data['ref']) && !empty($this->request->data['ref'])) {
				$ref = 'Inquiries.ref LIKE "%'.$this->request->data['ref'].'%"';
			}
			if (isset($this->request->data['vessel']) && !empty($this->request->data['vessel'])) {
				$vessel = 'Inquiries.vessel LIKE "%'.$this->request->data['vessel'].'%"';
			}
			if (isset($this->request->data['imo_no']) && !empty($this->request->data['imo_no'])) {
				$imo_no = 'Inquiries.imo_no LIKE "%'.$this->request->data['imo_no'].'%"';
			}
			if (isset($this->request->data['hull_no']) && !empty($this->request->data['hull_no'])) {
				$hull_no[] = 'Inquiries.hull_no LIKE "%'.$this->request->data['hull_no'].'%"';
			}
			// if (isset($this->request->data['status']) && !empty($this->request->data['status'])) {
			// 	if ($this->request->data['status'] == 'true') {
			// 		$conditions .=' AND status = 1';
			// 	} else if($this->request->data['status'] == 'false'){
			// 		$conditions .=' AND status = 0';
			// 	} else {
			// 		$conditions .='';
			// 	}
			// }
			if (isset($this->request->data['start']) && isset($this->request->data['end'])) {
				$created = ['Inquiries.created <=' => $this->request->data['end'], 'Inquiries.created >=' => $this->request->data['start']];
			}
			$start = $this->request->data['start'];$end = $this->request->data['end'];
			$inquiries = $this->Inquiries->find()
			->contain([
				'Users' => function ($q) {
					return $q->autoFields(false)->select(['id','username','fullname']);
				},
				'InquirieSuppliers' => function ($q) {
					return $q->autoFields(false)->select(['id','inquiry_id','status']);
				}
			])
			->select(['Inquiries.id','Inquiries.user_id','Inquiries.status','Inquiries.type','Inquiries.vessel','Inquiries.imo_no','Inquiries.hull_no','Inquiries.ref','Inquiries.created'])
			->where([$created])->orWhere([$ref])->orWhere([$vessel])->orWhere([$imo_no])->orWhere([$hull_no])
			->order(['Inquiries.created'  => 'DESC']);
			$this->set(compact('inquiries','start','end'));
		} else {
			$inquiries = $this->Inquiries->find()
				->contain([
					'Users' => function ($q) {
						return $q->autoFields(false)->select(['id','username','fullname']);
					},
					'InquirieSuppliers' => function ($q) {
						return $q->autoFields(false)->select(['id','inquiry_id','status']);
					}
				])
				->select(['Inquiries.id','Inquiries.user_id','Inquiries.status','Inquiries.type','Inquiries.vessel','Inquiries.imo_no','Inquiries.hull_no','Inquiries.ref','Inquiries.created'])
				->where(function($exp) {
					return $exp->between('Inquiries.created', date('Y-m-01'), date('Y-m-t'), 'date');
				})
				->order(['Inquiries.created'  => 'DESC']);
			$this->set(compact('inquiries'));
		}
	}

	public function InquiriesDetails($id)    {	
		if (empty($this->Inquiries->findById($id)->select(['id'])->first())) {
			throw new NotFoundException(__('Inquiries not found'));
		}

		$InquirieSupplier = TableRegistry::get('InquirieSuppliers');
		$inquiry = $this->Inquiries->getInfo($id);
	
		$total = 0;
		if ($inquiry->type == AVAILABLE) {
			# 1 Price
			foreach ($inquiry->inquirie_products as $inquirieProducts){
				$no = ($inquirieProducts->no == 0)? "":$inquirieProducts->no; 
				$price = ($inquirieProducts->products['retail_price'] == 0)? "":$inquirieProducts->products['retail_price']; 
				$data[] = [	
					"ProductID"			=> $inquirieProducts->id,
					"no" 				=> $no,
					"name"				=> $inquirieProducts->products['product_name'],
					"maker_type_ref"	=> "",
					"partno"			=> $inquirieProducts->products['sku'],
					"unit"				=> $inquirieProducts->products['unit'],
					"quantity"			=> $inquirieProducts->quantity,
					"price"				=> $price,
					"remark"			=> ""
				];
				$total = $total + $price;
			}
		} else {
			# 2 No Price
			foreach ($inquiry->inquirie_products as $inquirieProducts){
				$no = ($inquirieProducts->no == 0)? "":$inquirieProducts->no; 
				$price = ($inquirieProducts->price == 0)? "":$inquirieProducts->price; 
				$data[] = [
					"ProductID"			=> $inquirieProducts->id,
					"no" 				=> $no,
					"name"				=> $inquirieProducts->name,
					"maker_type_ref"	=> $inquirieProducts->maker_type_ref,
					"partno"			=> $inquirieProducts->partno,
					"unit"				=> $inquirieProducts->unit,
					"quantity"			=> $inquirieProducts->quantity,
					"price"				=> $price,
					"remark"			=> $inquirieProducts->remark
				];
				$total = $total + $price;
			}
		}
		// pr($data);die();
		$data = json_encode($data);
		$user_id = $InquirieSupplier->Users->find('list',[ 'keyField' => 'id', 'valueField' => 'username' ]);
		$this->set(compact('inquiry','data','total','user_id'));
		$this->set('_serialize', ['inquiry']);
	}

	public function CreateInq() {
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$InquirieProduct = TableRegistry::get('InquirieProducts');
			$this->request->data['data']['inquiry_id'] = $this->request->data['id'];
			$inquiryproducts = $InquirieProduct->newEntity();
			$inquiryproducts = $InquirieProduct->patchEntity($inquiryproducts, $this->request->data['data']);
			if ($InquirieProduct->save($inquiryproducts)) {
				die('ok');
			} else {
				die('error');
			}
		}
	}

	public function DestroyInq() {
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$InquirieProduct = TableRegistry::get('InquirieProducts');
			$inquiryproducts = $InquirieProduct->get($this->request->data['data']['ProductID']);
			if ($InquirieProduct->delete($inquiryproducts)) {
				echo __('The product has been deleted.');
			} else {
				echo __('The product could not be deleted. Please, try again.');
			}
		}
	}

	public function UpdateSupplierProduct() {
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			// pr(count($this->request->data));die();
			$IngSupProd 		= TableRegistry::get('inquirie_supplier_products');
			$InquirieProduct 	= TableRegistry::get('inquirie_products');
			$supplier_product 	= $IngSupProd->get($this->request->data['data']['ProductID'], ['contain' => []]);
			$supplier_product 	= $IngSupProd->patchEntity($supplier_product, $this->request->data['data']);
			if ($IngSupProd->save($supplier_product)) {
				$InquirieProduct->updateAll(['quantity' => $this->request->data['data']['quantity'], 'unit' => $this->request->data['data']['unit']], ['id' => $supplier_product['inquirie_product_id']]);
				$this->Inquiries->InquirieSuppliers->updateAll(['status' => 1],[ 'id' => $supplier_product->inquirie_supplier_id]);
			}
			$total 	 = $this->Inquiries->SumPrice($supplier_product->inquirie_supplier_id);
			$message = array('total' => number_format($total, 2), 'id' => $supplier_product->inquirie_supplier_id);
			echo json_encode($message); exit();
		}
	}

	public function InquiriesSuppliers($id) {
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		$SupplierPic = TableRegistry::get('Supplier_pics');
		$inqSuppliers = $InquirieSupplier->find()->contain([
			'Inquiries'=> function ($q) {
				return $q->autoFields(false)->select(['id','vessel','ref']);
			},
			'Suppliers' => function ($q) {
				return $q->autoFields(false)->select(['id','name']);
			},
			'SupplierPics' => function ($q) {
				return $q->autoFields(false)->select(['id','name']);
			},
			'Users' => function ($q) {
				return $q->autoFields(false)->select(['id','username']);
			},
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_product_id','InquirieSupplierProducts.inquirie_supplier_id','InquirieSupplierProducts.price','inquirie_products.quantity'])
					->leftJoin('inquirie_products','inquirie_products.id = InquirieSupplierProducts.inquirie_product_id');
			}
		])->where(['inquiry_id' => $id])->toarray();
	
		// pr($inqSuppliers);die();
		
		$total1 = $this->Inquiries->InquirieProducts->find()->where(['inquiry_id' => $id,'level' => 1])->count();
		$options = $SupplierPic->find('list',[ 'keyField' => 'id', 'valueField' => 'name' ])->where(['supplier_id'=>1]);
		$user_id = $InquirieSupplier->Users->find('list',[ 'keyField' => 'id', 'valueField' => 'username' ]);
		$supplier_id = $InquirieSupplier->Suppliers->find('list',[ 'keyField' => 'id', 'valueField' => 'name' ]);

		$this->set(compact('inqSuppliers','id','options','total1', 'user_id','supplier_id'));
	}

	public function SuppliersQuotation($id)	{
		$inqSuppliers = $this->Inquiries->query4($id);
		$this->set(compact('inqSuppliers'));
	}	

	public function SupplierQuotationDetails(){
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$SupplierQuotation = $this->Inquiries->query4($this->request->data['id']);
			foreach ($SupplierQuotation->inquirie_supplier_products as $QuotationProducts){
				$qp = $QuotationProducts['inquirie_products'];
				$data[] = [
					"ProductID" 	=> $QuotationProducts->id,
					"no" 			=> $qp['no'],
					"name"			=> $qp['name'],
					"maker_type_ref"=> $qp['maker_type_ref'],
					"partno"		=> $qp['partno'],
					"unit"			=> $qp['unit'],
					"quantity"		=> $qp['quantity'],
					"price"			=> $QuotationProducts->price,
					"remark"		=> $qp['remark']
				];
			}

			$data = json_encode($data);
			$this->set(compact('SupplierQuotation', 'data'));
			$this->render('/Element/Inquiries/supplier_quotation_details');
		}
	}

	public function GetSupplierDetails(){
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$InquirieProduct = TableRegistry::get('inquirie_products');
			$inqSuppliers = $this->Inquiries->InquirieSupplierInfo($this->request->data['id']);
		
			$count = count($inqSuppliers->inquirie_supplier_products);
			$data = '';
			$total = 0;
			if (!empty($inqSuppliers->inquirie_supplier_products)) {
				foreach ($inqSuppliers->inquirie_supplier_products as $QuotationProducts){
					$qp = $QuotationProducts['inquirie_products'];
					$total_price = $QuotationProducts->price * $qp['quantity'];
					$total = $total + ($QuotationProducts->price *$qp['quantity']);
					$data[] = [
						"ProductID"		=> $QuotationProducts->id,
						"no" 			=> $qp['no'],
						"name"			=> $qp['name'],
						"maker_type_ref"=> $qp['maker_type_ref'],
						"partno"		=> $qp['partno'],
						"unit"			=> $qp['unit'],
						"quantity"		=> $qp['quantity'],
						"price"			=> $QuotationProducts->price,
						"delivery_time"	=> $QuotationProducts->delivery_time,
						"total_price"	=> $total_price,
						"remark"		=> $QuotationProducts->remark
					];
				}
			}
			$SupplierPic = TableRegistry::get('Supplier_pics');
			
			$supplier_pics = $SupplierPic->find('list',[ 'keyField' => 'id', 'valueField' => 'name' ])->where(['supplier_id'=>$inqSuppliers['supplier']['id']]);
			$data = json_encode($data);
			$main_id = $InquirieProduct->find('list',['keyField'=>'main','valueField'=>'name'])->where(['inquiry_id' => $inqSuppliers->inquiry['id'], 'level' => 0]);
			
			$this->set(compact('inqSuppliers','main_id','count','data','total','supplier_pics'));
			$this->render('/Element/Inquiries/supplier_details');
		}
	}

	public function GetPurchaseOrder(){
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$InquirieProduct = TableRegistry::get('inquirie_products');
			$inqSuppliers = $this->Inquiries->PurchaseOrderDetails($this->request->data['id']);
			$count = count($inqSuppliers->inquirie_supplier_products);
			$data = '';
			$total = 0;
			if (!empty($inqSuppliers->inquirie_supplier_products)) {
				foreach ($inqSuppliers->inquirie_supplier_products as $QuotationProducts){
					$qp = $QuotationProducts['inquirie_products'];
					$total_price = $QuotationProducts->price * $qp['quantity'];
					$total = $total + ($QuotationProducts->price *$qp['quantity']);
					$data[] = [
						"ProductID"		=> $QuotationProducts->id,
						"no" 			=> $qp['no'],
						"name"			=> $qp['name'],
						"maker_type_ref"=> $qp['maker_type_ref'],
						"partno"		=> $qp['partno'],
						"unit"			=> $qp['unit'],
						"quantity"		=> $qp['quantity'],
						"price"			=> $QuotationProducts->price,
						"delivery_time"	=> $QuotationProducts->delivery_time,
						"total_price"	=> $total_price,
						"remark"		=> $QuotationProducts->remark
					];
				}
			}
			$data = json_encode($data);
			$main_id = $InquirieProduct->find('list',['keyField'=>'main','valueField'=>'name'])->where(['inquiry_id' => $inqSuppliers->inquiry['id'], 'level' => 0]);
			$this->set(compact('inqSuppliers','main_id','count','data','total'));
			$this->render('/Element/Inquiries/supplier_details');
		}
	}

	public function GetPurchaseOrderAvailable(){
		if ($this->request->is('Ajax')) {
			$this->autoRender = false; 
			$inqSuppliers = $this->Inquiries->PurchaseOrderDetailsAVAILABLE($this->request->data['id'],$this->request->data['inquiry_id']);
			$data = '';
			$total = 0;
			if (!empty($inqSuppliers)) {
				foreach ($inqSuppliers as $key => $QuotationProducts){

					$total_price = $QuotationProducts['retail_price'] * $QuotationProducts['quantity'];
					$total_price = $total_price + (($total_price*$QuotationProducts['profit'])/100);
					
					$total = $total + $QuotationProducts['retail_price'];
					$data[] = [
						"ProductID"		=> $QuotationProducts['id'],
						"no" 			=> $key+1,
						"name"			=> $QuotationProducts['product_name'],
						"maker_type_ref"=> '',
						"partno"		=> $QuotationProducts['serial_no'],
						"unit"			=> $QuotationProducts['unit'],
						"quantity"		=> $QuotationProducts['quantity'],
						"profit" 		=> $QuotationProducts['profit'],
						"price"			=> $QuotationProducts['retail_price'],
						"delivery_time"	=> '',
						"total_price"	=> $total_price,
						"remark"		=> ''
					];
				}
			}
			
			$data = json_encode($data);
			
			$this->set(compact('inqSuppliers','data','total'));
			$this->render('/Element/Inquiries/po');
		}
	}

	public function AddInqSupplier($id = null){
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
			if (!$InquirieSupplier->exists([
					'supplier_id' => $this->request->data['supplier_id'], 
					'inquiry_id'  => $this->request->data['inquiry_id']])) {
				$inqSupp = $InquirieSupplier->newEntity();
				$inqSupp = $InquirieSupplier->patchEntity($inqSupp, $this->request->data);
				if ($InquirieSupplier->save($inqSupp)) {
					$html = $this->Inquiries->query10($inqSupp->id);
					$msg = array('status' => true, 'result' => $html);
				} else {
					$msg = array('status' => false, 'result' => 'Error');
				}
			} else {
				$msg = array('status' => false, 'result' => 'Suppliers exists!');
			}
			echo json_encode($msg); exit();
		}
	}

	public function DelInqSupplier($id = null) {
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$inqSupp = $InquirieSupplier->get($this->request->data['id']);
			if ($InquirieSupplier->delete($inqSupp)) {
				echo "OK";
			} else {
				echo "Error!";
			}
			exit();
		}else {
			// pr($id);die();
			$this->request->allowMethod(['post', 'delete']);
			$inqSupp = $InquirieSupplier->get($id);
			if ($InquirieSupplier->delete($inqSupp)) {
				return $this->redirect(['action' => 'inquiries-suppliers', $inqSupp->inquiry_id]);
			} else {
				return $this->redirect(['action' => 'inquiries-suppliers', $inqSupp->inquiry_id]);
			}
		}
		
	}

	public function AddSupProd($inqsupp_id, $inquiry_id) {
		if (isset($this->request->data['num'])) {
			$data = $this->Inquiries->func1($this->request->data['num'], null,$inquiry_id, $inqsupp_id);
		}else{
			$data = $this->Inquiries->func1(null, $this->request->data['main'],$inquiry_id, $inqsupp_id);
		}
		if (isset($data) && !empty($data)) {
			if ($this->Inquiries->saveInqSupProd($data)) {
			} else{
				$this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
			}
		} else{
			$this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
		}
		return $this->redirect(['action' => 'inquiries-suppliers', $inquiry_id]);
	}
	
	public function ChooseAll($inquiry_id = Null, $supplier_id = Null){
		$InquirieProduct = TableRegistry::get('inquirie_products');
		$InqSupProd = TableRegistry::get('inquirie_supplier_products');
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$inquiryproducts = $InquirieProduct->find()->select('id')->where([ 'inquiry_id' => $this->request->data['inquiry_id'], 'level' => 1 ]);
			$data = array();
			foreach ($inquiryproducts as $key => $inquiryproduct) {
				if (!$InqSupProd->exists(['inquirie_supplier_id' => $this->request->data['supplier_id'], 'inquirie_product_id' => $inquiryproduct->id])) {
					$data[$key]['inquirie_supplier_id'] = $this->request->data['supplier_id'];
					$data[$key]['inquirie_product_id']  = $inquiryproduct->id;
				}
			}
			if (isset($data) && !empty($data)) {
				$this->Inquiries->saveInqSupProd($data);
			}
			//#####
			$InquirieProduct = TableRegistry::get('inquirie_products');
			$inqSuppliers = $this->Inquiries->InquirieSupplierInfo($this->request->data['supplier_id']);
			$count = count($inqSuppliers->inquirie_supplier_products);
			$data = '';
			$total = 0;
			if (!empty($inqSuppliers->inquirie_supplier_products)) {
				foreach ($inqSuppliers->inquirie_supplier_products as $QuotationProducts){
					$qp = $QuotationProducts['inquirie_products'];
					$total_price = $QuotationProducts->price * $qp['quantity'];
					$total = $total + ($QuotationProducts->price *$qp['quantity']);
					$data[] = [
						"ProductID"		=> $QuotationProducts->id,
						"no" 			=> $qp['no'],
						"name"			=> $qp['name'],
						"maker_type_ref"=> $qp['maker_type_ref'],
						"partno"		=> $qp['partno'],
						"unit"			=> $qp['unit'],
						"quantity"		=> $qp['quantity'],
						"price"			=> $QuotationProducts->price,
						"delivery_time"	=> $QuotationProducts->delivery_time,
						"total_price"	=> $total_price,
						"remark"		=> $QuotationProducts->remark
					];
				}
			}

			$data = json_encode($data);
			$main_id = $InquirieProduct->find('list',['keyField'=>'main','valueField'=>'name'])->where(['inquiry_id' => $inqSuppliers->inquiry['id'], 'level' => 0]);
			
			$this->set(compact('inqSuppliers','main_id','count','data','total'));
			$this->render('/Element/Inquiries/supplier_details');
			//#####
		} else {
		
			$inquiryproducts = $InquirieProduct->find()->select('id')->where([ 'inquiry_id' => $inquiry_id, 'level' => 1 ]);
			$data = array();
			foreach ($inquiryproducts as $key => $inquiryproduct) {
				if (!$InqSupProd->exists(['inquirie_supplier_id' => $supplier_id, 'inquirie_product_id' => $inquiryproduct->id])) {
					$data[$key]['inquirie_supplier_id'] = $supplier_id;
					$data[$key]['inquirie_product_id']  = $inquiryproduct->id;
				}
			}
			if (isset($data) && !empty($data)) {
				if ($this->Inquiries->saveInqSupProd($data)) {
				} else {
					$this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
				}
			} else {
				$this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
			}
			return $this->redirect(['action' => 'inquiries-suppliers', $inquiry_id]);
		}
	}

	public function ChooseMain(){
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			if (isset($this->request->data['num'])) {
				$data = $this->Inquiries->func1($this->request->data['num'], null,$this->request->data['inquiry_id'], $this->request->data['supplier_id']);
			}else{
				$data = $this->Inquiries->func1(null, $this->request->data['main'],$this->request->data['inquiry_id'], $this->request->data['supplier_id']);
			}

			if (isset($data) && !empty($data)) {
				$this->Inquiries->saveInqSupProd($data);
			} 
			//#####
			$InquirieProduct = TableRegistry::get('inquirie_products');
			$inqSuppliers = $this->Inquiries->InquirieSupplierInfo($this->request->data['supplier_id']);
			$count = count($inqSuppliers->inquirie_supplier_products);
			$data = '';
			$total = 0;
			if (!empty($inqSuppliers->inquirie_supplier_products)) {
				foreach ($inqSuppliers->inquirie_supplier_products as $QuotationProducts){
					$qp = $QuotationProducts['inquirie_products'];
					$total_price = $QuotationProducts->price * $qp['quantity'];
					$total = $total + ($QuotationProducts->price *$qp['quantity']);
					$data[] = [
						"ProductID"		=> $QuotationProducts->id,
						"no" 			=> $qp['no'],
						"name"			=> $qp['name'],
						"maker_type_ref"=> $qp['maker_type_ref'],
						"partno"		=> $qp['partno'],
						"unit"			=> $qp['unit'],
						"quantity"		=> $qp['quantity'],
						"price"			=> $QuotationProducts->price,
						"delivery_time"	=> $QuotationProducts->delivery_time,
						"total_price"	=> $total_price,
						"remark"		=> $QuotationProducts->remark
					];
				}
			}
			$data = json_encode($data);
			$main_id = $InquirieProduct->find('list',['keyField'=>'main','valueField'=>'name'])->where(['inquiry_id' => $inqSuppliers->inquiry['id'], 'level' => 0]);
			
			$this->set(compact('inqSuppliers','main_id','count','data','total'));
			$this->render('/Element/Inquiries/supplier_details');
			//#####
		}
	}

	public function DeleteItemSupplier(){
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$InqSupProd = TableRegistry::get('inquirie_supplier_products');
			$inqsup = $InqSupProd->get($this->request->data['id']);
			if ($InqSupProd->delete($inqsup)) {
				echo "OK";
			} else {
				echo "NO";
			}
		}
	}

	public function comparing($id){
		$inquiryproducts = $this->Inquiries->query2($id);
		// Get list supplier in inquiries
		$inqSuppliers  = $this->Inquiries->query3($id);
		// $listSuppliers = $this->Inquiries->query3_1($id);
	
		$list = ['LowestPrice' => 'Lowest Price', 'HightPrice' => 'Hight Price'];
		// if (!empty($listSuppliers)) {
			// foreach ($listSuppliers as $key => $value) {
				// $list[$value['id']] = $value['username']; 
			// }
		// }

		if (!empty($inqSuppliers)) {
			foreach ($inqSuppliers as $key => $value) {
				$list[$value->id] = $value->supplier['name']; 
			}
		}
		
		// End list supplier
		$this->set(compact('inquiryproducts','inqSuppliers','listSuppliers','id','list'));
	}

	public function SetChoose()	{
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$IngSupProd = TableRegistry::get('inquirie_supplier_products');
			$IngSupProd->updateAll(['choose' => 0 ], ['inquirie_product_id' => $this->request->data['inquirie_product_id']]);
			$result = $IngSupProd->updateAll(['choose'=>1],['id'=>$this->request->data['id']]);
			echo $result;
		}
	}
	
	public function quotations($id, $type = null) {
		if (empty($this->Inquiries->findById($id)->select(['id'])->first())) {
			throw new NotFoundException(__('Inquiries not found'));
		} 
		$result		 = $this->get_data_kendo($id);
		$inquiries	 = $result['inquiries'];
		// pr($inquiries);die();
		$data		 = json_encode($result['data']);
		$myarr		 = json_encode($result['arr']);
		$grand_total = $result['grand_total'];
		$this->set(compact('inquiries','data','myarr','grand_total'));
	}
	
	public function UpdateInq() {
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$InquirieProduct = TableRegistry::get('InquirieProducts');
			$inquiryproducts = $InquirieProduct->get($this->request->data['data']['ProductID'], [
				'contain' => []
			]);	 
			$inquiryproducts = $InquirieProduct->patchEntity($inquiryproducts, $this->request->data['data']);
			if ($InquirieProduct->save($inquiryproducts)) {
				if ($this->request->data['type'] == UNAVAILABLE) {
					$total = $this->Inquiries->get_total_unavailable($inquiryproducts->inquiry_id);
				} else {
					$total = $this->Inquiries->get_total_available($inquiryproducts->inquiry_id);
				}
				echo json_encode($total);exit();
			} else {
				die('error');
			}
		}
	}

	public function UpdateInquiries() {
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$inquiry_id = $this->Inquiries->UpdateInquiriesProducts($this->request->data['data']['ProductID'],$this->request->data['data']);
			if ($this->request->data['type'] == AVAILABLE) {
				$inquiries = $this->Inquiries->query9($inquiry_id);
				$data = $this->Inquiries->func2($inquiries->inquirie_products);
				echo json_encode($data);exit();
			} else {
				$inquiries = $this->Inquiries->query1($inquiry_id);
				$data = $this->get_kendoui_data($inquiries);
				echo json_encode($data);exit();
			}
		}
	}

	public function UpdateInq2() {
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$InquirieProduct = TableRegistry::get('InquirieProducts');
			$inquiryproducts = $InquirieProduct->get($this->request->data['data']['ProductID'], [
				'contain' => []
			]);	 
			$inquiryproducts = $InquirieProduct->patchEntity($inquiryproducts, $this->request->data['data']);
			
			if ($InquirieProduct->save($inquiryproducts)) {
				$inquiries = $this->Inquiries->query9($inquiryproducts->inquiry_id);
				$data = ''; $grand_total = 0;
				if (!empty($inquiries->inquirie_products)) {
					foreach ($inquiries->inquirie_products as $key => $inquirie_product){
						$u_p 	 = $inquirie_product['products']['retail_price'] + (($inquirie_product['products']['retail_price']*$inquirie_product->profit)/100);
						$f_total = $u_p*$inquirie_product->quantity;
						$grand_total = $grand_total+$f_total;
						$arr[] 	 = $inquirie_product->id;
						$data[] = [
							"ProductID"		 => $inquirie_product->id,
							"no"			 => $key+1, 
							"name"			 => $inquirie_product['products']['product_name'],
							"unit"			 => $inquirie_product['products']['unit'],
							"quantity"		 => $inquirie_product->quantity,

							"supplier"		 => $inquirie_product['users']['username'],
							"supp_u_p"		 => $inquirie_product['products']['retail_price'],
							"supp_u_p_usd"	 => '',
							
							"profit"		 => $inquirie_product->profit,

							"u_p"			 => $u_p,
							"u_p_usd"		 => '',
							"f_total"		 => $f_total,
							"f_total_usd"	 => '',
							
							"del_time"		 => '',
							"del_time_final" => '',
							"remark"		 => ''
						];
					}
				}
				
				echo json_encode($data);
			} else {
				die('error');
			}
		}
	}

	public function SelectPrice($inquiry_id) {
		switch ($this->request->data['choose']) {
			case 'LowestPrice':
				$result = $this->Inquiries->query6($inquiry_id);
				$type = 'LowestPrice';
				break;
			case 'HightPrice':
				$result = $this->Inquiries->query7($inquiry_id);
				$type = 'HightPrice';
				break;
			default:
				$result = $this->Inquiries->query8($inquiry_id, $this->request->data['choose']);
				$type = '';
				break;
		}
		if ($result) {
			$this->Flash->success(__('The inquiry has been saved.'.$type));
		} else {
			$this->Flash->error(__('The inquiry could not be saved. Please, try again.'.$type));
		}
		return $this->redirect(['action' => 'comparing', $inquiry_id]);
	}

	public function download($id) {
		$files = $this->Inquiries->Attachments->find()->select(['id','path'])->where(['id'=>$id])->first();
		if( !empty($files) ) {
			$this->response->file($files->path,[ 'download' => true, 'name' => basename($files->path)]);
			return $this->response;
		}
		else
			return true;
		exit();
	}

	public function UpdateInquirieSupplier() {
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
			$datasourceIS = $InquirieSupplier->connection();
			try {
				$datasourceIS->begin();
				$inqSuppliers = $InquirieSupplier->get($this->request->data['id'], [ 'contain' => [] ]);
				$inqSuppliers = $InquirieSupplier->patchEntity($inqSuppliers, $this->request->data);
				if ($InquirieSupplier->save($inqSuppliers)) {
					echo "The infomation has been updated";
				} else {
					echo "The infomation could not be saved. Please, try again.";
				}
				$datasourceIS->commit();
			} catch (Exception $e) {
				$datasourceIS->rollback();
				throw $e;
			}			
		}
	}

	public function UpdateQuotations()	{
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			unset($this->request->data['created']);
			$result = $this->Inquiries->UpdateData($this->requevst->data);
			if ($result) {
				echo "The inquiry has been updated";
			} else {
				echo "The infomation could not be saved. Please, try again.";
			}
		}
	}

	public function UpdateInquiriesInfo() {
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$result = $this->Inquiries->UpdateData($this->request->data);
			if ($result) {
				echo "The inquiry has been updated";
			} else {
				echo "The infomation could not be saved. Please, try again.";
			}
		}
	}

	public function get_kendoui_data($inquiries) {
		$data = '';$total = 0;
		if (!empty($inquiries->inquirie_products)) {
			foreach ($inquiries->inquirie_products as $inquirie_product){
				
				if (!empty($inquirie_product->inquirie_supplier_products)) {
					$supp_u_p 	= $inquirie_product->inquirie_supplier_products[0]['price']; 
					$remark 	= $inquirie_product->inquirie_supplier_products[0]['remark'];
					$no 		= $inquirie_product->no; 
					$delivery_time = $inquirie_product->inquirie_supplier_products[0]['delivery_time'];
					$supplier 	= $inquirie_product->inquirie_supplier_products[0]['suppliers']['name'];
				} else {
					$no = ''; $supp_u_p = ''; $delivery_time = ''; $remark = '';
				}
				$u_p 	 = $supp_u_p + (($supp_u_p*$inquirie_product->profit)/100);
				$f_total = $u_p*$inquirie_product->quantity;
				$arr[] = $inquirie_product->id;
				$total = $total+$f_total;
				$data[] = [
					"ProductID"		 => $inquirie_product->id,
					"no" 			 => $no,
					"name"			 => $inquirie_product->name,
					"unit"			 => $inquirie_product->unit,
					"quantity"		 => $inquirie_product->quantity,

					"supplier"		 => $supplier,
					"supp_u_p"		 => $supp_u_p,
					"supp_u_p_usd"	 => '',
					
					"profit"		 => $inquirie_product->profit,

					"u_p"	 		 => $u_p,
					"u_p_usd"		 => '',
					"f_total"		 => $f_total,
					"f_total_usd"	 => '',
					
					"del_time"		 => $delivery_time,
					"del_time_final" => '',
					"remark"		 => $remark
				];
			}
		}
		$myarray = array('data' => $data, 'total' => $total);
		return $myarray;
	}

	protected function get_data_kendo($id)	{
		### Quotation
		if ($this->Inquiries->exists(['id' => $id, 'type' => AVAILABLE])) {
			$inquiries = $this->Inquiries->query9($id);
			$data = ''; $grand_total = 0;
			if (!empty($inquiries->inquirie_products)) {
				foreach ($inquiries->inquirie_products as $key => $inquirie_product){
					$u_p 	 = $inquirie_product['products']['retail_price'] + (($inquirie_product['products']['retail_price']*$inquirie_product->profit)/100);
					$f_total = $u_p*$inquirie_product->quantity;
					$grand_total = $grand_total+$f_total;
					$arr[] = $inquirie_product->id;
					$data[] = [
						"ProductID"		 => $inquirie_product->id,
						"choose" 		 => NULL,
						"no" 			 => $key+1,
						"name"			 => $inquirie_product['products']['product_name'],
						"unit"			 => $inquirie_product['products']['unit'],
						"quantity"		 => $inquirie_product->quantity,
						"supplier"		 => $inquirie_product['users']['username'],
						"supp_u_p"		 => $inquirie_product['products']['retail_price'],
						"supp_u_p_usd"	 => '',
						"profit"		 => $inquirie_product->profit,
						"u_p"	 		 => $u_p,
						"u_p_usd"		 => '',
						"f_total"		 => $f_total,
						"f_total_usd"	 => '',
						"del_time"		 => '',
						"del_time_final" => '',
						"remark"		 => '' 
					];
				} 
			}
		} else { 
			$inquiries = $this->Inquiries->query1($id);
			$data = ''; $grand_total = 0;
			if (!empty($inquiries->inquirie_products)) {
				foreach ($inquiries->inquirie_products as $inquirie_product){
					if (!empty($inquirie_product->inquirie_supplier_products)) {
						$supp_u_p 	= $inquirie_product->inquirie_supplier_products[0]['price']; 
						$remark 	= $inquirie_product->inquirie_supplier_products[0]['remark'];
						$no 		= $inquirie_product->no; 
						$delivery_time = $inquirie_product->inquirie_supplier_products[0]['delivery_time'];
						$supplier 	= $inquirie_product->inquirie_supplier_products[0]['suppliers']['name'];
					} else {
						$no = ''; $supp_u_p = ''; $delivery_time = ''; $remark = '';$supplier ='';
					}
					$u_p 	 = $supp_u_p + (($supp_u_p*$inquirie_product->profit)/100);
					$f_total = $u_p*$inquirie_product->quantity;
					$grand_total = $grand_total+$f_total;
					$arr[] = $inquirie_product->id;
					if ($u_p != NULL) {
						$data[] = [
							"ProductID"		 => $inquirie_product->id,
							"choose" 		 => NULL,
							"no" 			 => $no,
							"name"			 => $inquirie_product->name,
							"unit"			 => $inquirie_product->unit,
							"quantity"		 => $inquirie_product->quantity,
							"supplier"		 => $supplier,
							"supp_u_p"		 => $supp_u_p,
							"supp_u_p_usd"	 => '',
							"profit"		 => $inquirie_product->profit,
							"u_p"	 		 => $u_p,
							"u_p_usd"		 => '',
							"f_total"		 => $f_total,
							"f_total_usd"	 => '',
							"del_time"		 => $delivery_time,
							"del_time_final" => '',
							"remark"		 => $remark
						];
					}
					
					
				}
				
			}
		}

		$arr = array('inquiries' => $inquiries, 'data' => $data, 'arr' => $arr, 'grand_total' => $grand_total);
		return $arr;
	}

	public function SetProfitInquiries() {
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$ISP = TableRegistry::get('inquirie_supplier_products');
			foreach (json_decode($this->request->data['arrid']) as $key => $id) {
				$this->Inquiries->InquirieProducts->updateAll(['profit' => $this->request->data['percent']],[ 'id' => $id]);
			}
			if ($this->request->data['type'] == AVAILABLE) {
				$inquiries = $this->Inquiries->query9($this->request->data['inquiry_id']);
				$data = ''; $grand_total = 0;
				if (!empty($inquiries->inquirie_products)) {
					foreach ($inquiries->inquirie_products as $key => $inquirie_product){
						$u_p = $inquirie_product['products']['retail_price'] + (($inquirie_product['products']['retail_price']*$inquirie_product->profit)/100);
						$f_total = $u_p*$inquirie_product->quantity;
						$grand_total = $grand_total+$f_total;
						$arr[] = $inquirie_product->id;
						$data[] = [
							"ProductID"		 => $inquirie_product->id, 
							"no"			 => $key+1,
							"name"			 => $inquirie_product['products']['product_name'],
							"unit"			 => $inquirie_product['products']['unit'],
							"quantity"		 => $inquirie_product->quantity,
							"supplier"		 => $inquirie_product['users']['username'],
							"supp_u_p"		 => $inquirie_product['products']['retail_price'],
							"supp_u_p_usd"	 => '',
							"profit"		 => $inquirie_product->profit,
							"u_p"			 => $u_p,
							"u_p_usd"		 => '',
							"f_total"		 => $f_total,
							"f_total_usd"	 => '',
							"del_time"		 => '',
							"del_time_final" => '',
							"remark"		 => ''
						];
					}
				}
				$myarray = array('data' => $data, 'total' => $grand_total);
				echo json_encode($myarray);exit();
			} else {

				$inquiries = $this->Inquiries->query1($this->request->data['inquiry_id']);
				$data = $this->get_kendoui_data($inquiries);
				echo json_encode($data);exit();
			}
		}
	}

	public function SetProfitInquiry() {
		if ($this->request->is('Ajax')) { 	
			$this->autoRender = false;

			$ISP = TableRegistry::get('inquirie_supplier_products');
			
			foreach (json_decode($this->request->data['arrid']) as $key => $id) {
				$this->Inquiries->InquirieProducts->updateAll(['profit' => $this->request->data['percent']],[ 'id' => $id]);
			}
			$inquiries = $this->Inquiries->query9($this->request->data['inquiry_id']);
			
			$data = ''; $grand_total = 0;
			if (!empty($inquiries->inquirie_products)) {
				foreach ($inquiries->inquirie_products as $key => $inquirie_product){

					$u_p 	 = $inquirie_product['products']['retail_price'] + (($inquirie_product['products']['retail_price']*$inquirie_product->profit)/100);
					$f_total = $u_p*$inquirie_product->quantity;
					$grand_total = $grand_total+$f_total;
					$arr[] = $inquirie_product->id; 
					$data[] = [
						"ProductID"		 => $inquirie_product->id, 
						"no"			 => $key+1,
						"name"			 => $inquirie_product['products']['product_name'],
						"unit"			 => $inquirie_product['products']['unit'],
						"quantity"		 => $inquirie_product->quantity,

						"supplier"		 => $inquirie_product['users']['username'],
						"supp_u_p"		 => $inquirie_product['products']['retail_price'],
						"supp_u_p_usd"	 => '',
						
						"profit"		 => $inquirie_product->profit,

						"u_p"			 => $u_p,
						"u_p_usd"		 => '',
						"f_total"		 => $f_total,
						"f_total_usd"	 => '', 
						 
						"del_time"		 => '',
						"del_time_final" => '',
						"remark"		 => ''
					];
				}
			}
			echo json_encode($data);
		}
	}

	public function SetDiscountInquiries() {
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$this->Inquiries->updateAll(['discount' => $this->request->data['discount']],[ 'id' => $this->request->data['inquiry_id']]);
		}
	}

	public function SetCommissionInquiries() {
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$this->Inquiries->updateAll(['commission' => $this->request->data['commission']],[ 'id' => $this->request->data['inquiry_id']]);
		}
	}

	public function SetAddCommissionInquiries()	{
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$this->Inquiries->updateAll(['add_commission' => $this->request->data['add_commission']],[ 'id' => $this->request->data['inquiry_id']]);
		}
	}

	public function ExtraCost() {
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			if (!empty($this->request->data['name'])) {
				$Extra = TableRegistry::get('extras');
				$this->request->data['inquiry_id'] = $this->request->data['inquiryid'] ;
				unset($this->request->data['inquiryid']);
				$extras = $Extra->newEntity();
				$extras = $Extra->patchEntity($extras, $this->request->data);
				$result = $Extra->save($extras);
				if ($result) {
					echo $extras->id;
				}
			} else {
				echo "Name empty!";
			}
		}
	}

	public function ExtraDelete(){
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$Extra = TableRegistry::get('extras');
			$extras = $Extra->get($this->request->data['id']);
			if ($Extra->delete($extras)) {
				echo (__('The cost & price has been deleted.'));
			} else {
				echo (__('The cost & price could not be deleted. Please, try again.'));
			}
		}
	}

	public function ExtraEdit(){
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$Extra = TableRegistry::get('extras');
			$extras = $Extra->get($this->request->data['id'], [
				'contain' => []
			]);
			$extras = $Extra->patchEntity($extras, $this->request->data);
			$result = $Extra->save($extras);
			if ($result) {
				echo $extras->id;
			}
		}
	}

	public function EditInquiriesCus()	{
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			// pr($this->request->data);die();
			$inquiry = $this->Inquiries->get($this->request->data['id'], [
				'contain' => []
			]);
			$attachments = TableRegistry::get('attachments');
			$inquiry = $this->Inquiries->patchEntity($inquiry, $this->request->data);
			if ($this->Inquiries->save($inquiry)) {
				$html = '';
				if (!empty($this->request->data['file'][0]['name'])) {
					$flag = true;
					for ($i=0; $i < count($this->request->data['file']); $i++) { 
						if(move_uploaded_file($this->request->data['file'][$i]['tmp_name'], FILES.$this->request->data['file'][$i]['name'])){
							$item['path']		= 'files'.DS.$this->request->data['file'][$i]['name'];
							$item['filename']	= $this->request->data['file'][$i]['name'];
							$item['inquiry_id']	= $inquiry->id;
							$attachment = $attachments->newEntity();
							$attachment = $attachments->patchEntity($attachment, $item);
							$attachments->save($attachment);
							$html .= '<tr id="attachments-'.$attachment->id.'"><td><a href="/inquiries/download/'.$attachment->id.'">'.$this->request->data['file'][$i]['name'].'</a></td><td><span class="cursor-point float-right remove-file-att" id="'.$attachment->id.'"><i class="fa fa-trash"></i></span></td></tr>';
						}
					}
				}
				echo $html;
			} else {
				echo (__('The inquiry could not be saved. Please, try again.'));
			}
			exit();
		}
	}

	public function OrderAcknowledgement($id=null){
		if (empty($this->Inquiries->findById($id)->select(['id'])->first())) {
			throw new NotFoundException(__('Inquiries not found'));
		}

		$result		 = $this->get_data_kendo($id);
		$inquiries 	 = $result['inquiries'];
		$data		 = json_encode($result['data']);
		$myarr		 = json_encode($result['arr']);
		$grand_total = json_encode($result['grand_total']);
		$this->set(compact('inquiries','data','myarr','grand_total'));
	}

	public function PurchaseOrder($id=null)	{
		if (empty($this->Inquiries->findById($id)->select(['id'])->first())) {
			throw new NotFoundException(__('Inquiries not found'));
		}

		if ($this->Inquiries->exists(['id' => $id, 'type' => AVAILABLE])) {
			$inqSuppliers = $this->Inquiries->PurchaseOrderInfo($id, AVAILABLE);
			$total = $this->Inquiries->InquirieProducts->find()->where(['inquiry_id' => $id])->count();
			$type = AVAILABLE;
		} else { 
			$inqSuppliers = $this->Inquiries->PurchaseOrderInfo($id, UNAVAILABLE);
			$total = $this->Inquiries->InquirieProducts->find()->where(['inquiry_id' => $id,'level' => 1])->count();
			$type = UNAVAILABLE;
		}
		// pr($inqSuppliers);die();
		$this->set(compact('id','inqSuppliers','total','type'));
	}

	public function InvoiceDocuments($id=null)	{
		if (empty($this->Inquiries->findById($id)->select(['id'])->first())) {
			throw new NotFoundException(__('Inquiries not found'));
		}

		$this->set('id', $id);

	}

	public function DeleteItemProducts(){
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			$InqProd = TableRegistry::get('inquirie_products');
			$IqSPrs  = TableRegistry::get('inquirie_supplier_products');
			$InqProd->deleteAll(['id IN' => $this->request->data['data']]);
			$IqSPrs->deleteAll(['inquirie_product_id IN' => $this->request->data['data']]);
			if (isset($this->request->data['font_end'])) {
				$result = $this->get_data_kendo_fontend($this->request->data['inquiry_id']);
			} else {
				$result = $this->get_data_kendo($this->request->data['inquiry_id']);
			}
			echo json_encode($result['data']);exit();
		}
	}

	public function RemoveFileAttachment()	{
		if ($this->request->is(['ajax', 'post'])) {
			$this->autoRender = false;
			$att = $this->Inquiries->Attachments->get($this->request->data['id']);
			if ($this->Inquiries->Attachments->delete($att)) {
				echo(__('The Attachments has been deleted.'));
			} else {
				echo(__('The Attachments could not be deleted. Please, try again.'));
			}
		}
	}

	public function searchinquiries()	{
		if ($this->request->is('post')) {
			// pr($this->request->data);die();
			$conditions = "";
			if (isset($this->request->data['data']['ref']) && !empty($this->request->data['data']['ref'])) {
				$conditions .=' AND ref like "%'.$this->request->data['data']['ref'].'%" ';
			}
			if (isset($this->request->data['data']['vessel']) && !empty($this->request->data['data']['vessel'])) {
				$conditions .=' AND vessel like "%'.$this->request->data['data']['vessel'].'%" ';
			}
			if (isset($this->request->data['data']['imo_no']) && !empty($this->request->data['data']['imo_no'])) {
				$conditions .=' AND imo_no like "%'.$this->request->data['data']['imo_no'].'%"';
			}
			if (isset($this->request->data['data']['hull_no']) && !empty($this->request->data['data']['hull_no'])) {
				$conditions .=' AND hull_no like "%'.$this->request->data['data']['hull_no'].'%"';
			}
			if (isset($this->request->data['data']['status']) && !empty($this->request->data['data']['status'])) {
				if ($this->request->data['data']['status'] == 'true') {
					$conditions .=' AND status = 1';
				} else if($this->request->data['data']['status'] == 'false'){
					$conditions .=' AND status = 0';
				} else {
					$conditions .='';
				}
			}
			if (isset($this->request->data['firstDay']) && !empty($this->request->data['firstDay'])) {
				$conditions .=' AND (created BETWEEN "'.$this->request->data['firstDay'].'" AND "'.$this->request->data['lastDay'].'")';
			}
			// pr($conditions);die();
			$products = $this->Inquiries->SearchInfo($this->Auth->user('id'),$conditions);
			echo json_encode($products); exit();
		}
		exit();
	}


	public function InquiryInfo() {

		if ($this->request->is(['get'])) {
			if (!empty($this->request->session()->read('firstDayInq'))) { 
				$arr = explode('-', $this->request->session()->read('firstDayInq'));
				$firstDay = $arr[2].'-'.$arr[0].'-'.$arr[1];
			} else {
				$firstDay = date('Y-m-01');
			}
			
			 $inquiries = $this->Inquiries->find()
			->select(['Inquiries.id','Inquiries.status','Inquiries.vessel','Inquiries.ref','Inquiries.type','Inquiries.imo_no','Inquiries.hull_no','Inquiries.description','Inquiries.created'])
			->where(['Inquiries.user_id' => $this->Auth->user('id'),'Inquiries.created >='=> $firstDay,'Inquiries.created <'=> date('Y-m-t')])
			->order(['Inquiries.created'  => 'DESC']);
			// pr($inquiries->toarray());die();
			echo json_encode($inquiries); exit();
		}
	}

	public function SetInquiriesDateSession() {
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			if (isset($this->request->data['firstDay']) && !empty($this->request->data['firstDay'])) {
				$date = date_create($this->request->data['firstDay']);
				$this->request->session()->write('firstDayInq', date_format($date, 'm-d-Y'));
			} elseif (isset($this->request->data['firstDay']) && $this->request->data['firstDay'] == '') {
				$this->request->session()->write('firstDayInq', '');
			}
		}elseif ($this->request->is('get')) {
			// pr($this->request->session()->read('firstDayInq'));die();
			if (!empty($this->request->session()->read('firstDayInq'))) {
				echo $this->request->session()->read('firstDayInq');
			} elseif ($this->request->session()->read('firstDayInq') == '') {
				echo "";
			} else {
				echo date('m-01-Y');
			}
		}
		exit();
	}
}

