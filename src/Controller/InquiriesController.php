<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;

/**
 * Inquiries Controller
 *
 * @property \App\Model\Table\InquiriesTable $Inquiries */
class InquiriesController extends AppController
{

	public function index()
	{
		$this->viewBuilder()->layout('product');
		$this->paginate = [
			'fields' => ['Inquiries.id','Inquiries.status','Inquiries.description','Inquiries.created'],
			'conditions' => ['Inquiries.user_id' => $this->Auth->user('id')],
			'order' => ['Inquiries.created'  => 'DESC'],
		];
		$inquiries = $this->paginate($this->Inquiries);
		
		$this->set(compact('inquiries'));
		$this->set('_serialize', ['inquiries']);
	}

	public function view($id = null)
	{
		$this->viewBuilder()->layout('product');
		$inquiry = $this->Inquiries->getInfo($id);
		$this->set('inquiry', $inquiry);
		$this->set('_serialize', ['inquiry']);
	}

	public function add()
	{
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

	public function edit($id = null)
	{
		// pr($this->request->data);die();
		$inquiry = $this->Inquiries->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$inquiry = $this->Inquiries->patchEntity($inquiry, $this->request->data);
			if ($this->Inquiries->save($inquiry)) {
				// $this->Flash->success(__('The inquiry has been saved.'));
				// return $this->redirect(['action' => 'InqDetails', $id]);
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

	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$inquiry = $this->Inquiries->get($id);
		if ($this->Inquiries->delete($inquiry)) {
			// $this->Flash->success(__('The inquiry has been deleted.'));
		} else {
			$this->Flash->error(__('The inquiry could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'inquiries']);
	}

	public function MakeInq() {
		if ($this->request->is('Ajax')) {
			$this->autoRender = false;
			if (!empty($this->Auth->user('id'))) {
				$data = [
					'status'        => '1',
					'type'          => UNAVAILABLE,
					'user_id'       => $this->Auth->user('id'),
					'vessel'        => $this->request->data['vessel'],
					'imo_no'        => $this->request->data['imo_no'],
					'hull_no'       => $this->request->data['hull_no'],
					'ref'           => $this->request->data['ref'],
					'description'   => $this->request->data['description']
				];
				$inquiry_id =  $this->Inquiries->saveInq($data);
				$i = 1; $parent = 1;
				foreach ($this->request->data['data'] as $key => $inq) {
					if (!empty($inq[0])) {
						$item[$key]['inquiry_id']      = $inquiry_id;
						$item[$key]['product_id']      = null;
						$item[$key]['name']            = $inq[0];
						$item[$key]['maker_type_ref']  = $inq[1];
						$item[$key]['partno']          = $inq[2];
						$item[$key]['unit']            = $inq[3];
						$item[$key]['quantity']        = $inq[4];
						$item[$key]['remark']          = $inq[5];
						$item[$key]['price']      	   = null;
						$item[$key]['status']          = true;
						if (!empty($inq[1]) || !empty($inq[2]) || !empty($inq[3]) || !empty($inq[4]) || !empty($inq[5])) {
							$item[$key]['level'] = 1;
							$item[$key]['parent'] = $parent;
							$item[$key]['no']    = $i;
							$i = $i + 1;
						} else {
							$parent = $parent + 1;
							$item[$key]['main'] = $parent;
						}
					}
				}
				// pr($item);die();
				if ($this->Inquiries->saveInqProduct($item)) {
					$this->Flash->success(__('The Inquiries has been saved.'));
				}
			} else {
				// Login
			}
			die();
		}
	}

	public function MakeInquiry() {
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
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

	public function Inquiries()    {
		$inquiries = $this->Inquiries->find()->select(['Inquiries.id','Inquiries.user_id','Inquiries.status','Inquiries.type','Inquiries.created','Users.id','Users.username'])->contain(['Users'])->order(['Inquiries.created'  => 'DESC']);
		$customers = $this->Inquiries->Customers->find('list',[ 'keyField' => 'id', 'valueField' => 'name' ]);
		$this->set(compact('inquiries','customers'));
	}

	public function InquiriesDetails($id)    {
		$InquirieSupplier = TableRegistry::get('InquirieSuppliers');
		$inquiry = $this->Inquiries->getInfo($id);

		$total = 0;
		if ($inquiry->type == AVAILABLE) {
			foreach ($inquiry->inquirie_products as $inquirieProducts){
				$no = ($inquirieProducts->no == 0)? "":$inquirieProducts->no; 
				$price = ($inquirieProducts['Products']['retail_price'] == 0)? "":$inquirieProducts['Products']['retail_price']; 
				$data[] = ["ProductID"=>$inquirieProducts->id, "no" => $no, "name"=> $inquirieProducts['Products']['product_name'], "maker_type_ref"=>"", "partno"=>$inquirieProducts['Products']['sku'], "unit"=>$inquirieProducts['Products']['unit'], "quantity"=>$inquirieProducts->quantity,"price"=>$price,"remark"=>$inquirieProducts->remark];
				$total = $total + $price;
			}
		}else {
			foreach ($inquiry->inquirie_products as $inquirieProducts){
				$no = ($inquirieProducts->no == 0)? "":$inquirieProducts->no; 
				$price = ($inquirieProducts->price == 0)? "":$inquirieProducts->price; 
				$data[] = ["ProductID"=>$inquirieProducts->id, "no" => $no, "name"=> $inquirieProducts->name, "maker_type_ref"=>$inquirieProducts->maker_type_ref, "partno"=>$inquirieProducts->partno, "unit"=>$inquirieProducts->unit, "quantity"=>$inquirieProducts->quantity,"price"=>$price,"remark"=>$inquirieProducts->remark];
				$total = $total + $price;
			}
		}
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

	public function UpdateInq() {
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$InquirieProduct = TableRegistry::get('InquirieProducts');
			$inquiryproducts = $InquirieProduct->get($this->request->data['data']['ProductID'], [
				'contain' => []
			]);
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
				die('ok');
			} else {
				die('error');
			}
		}
	}

	public function UpdateSupplierProduct() {
		if ($this->request->is('ajax')) {
			$this->autoRender = false;

			$IngSupProd = TableRegistry::get('inquirie_supplier_products');
			$InquirieProduct = TableRegistry::get('inquirie_products');
			$supplier_product = $IngSupProd->get($this->request->data['data']['ProductID'], [
				'contain' => []
			]);
			$supplier_product = $IngSupProd->patchEntity($supplier_product, $this->request->data['data']);

			if ($IngSupProd->save($supplier_product)) {

				$InquirieProduct->updateAll(['quantity' => $this->request->data['data']['quantity'], 'unit' => $this->request->data['data']['unit']], ['id' => $supplier_product['inquirie_product_id']]);
				echo true;
			} else {
				echo false;
			}
		}
	}

	public function info($id)	{
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		
		$inqSuppliers = $InquirieSupplier->find()->contain([
			'Suppliers' => function ($q) {
				return $q->autoFields(false)->select(['id','name']);
			},
			'Users' => function ($q) {
				return $q->autoFields(false)->select(['id','username']);
			},
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_supplier_id']);
			}
		])->where(['inquiry_id' => $id])->toarray();
		
		$inquiry = $this->Inquiries->getInfo($id);

		// $total = 0;
		$count = 0;
		if ($inquiry->type == AVAILABLE) {
			foreach ($inquiry->inquirie_products as $inquirieProducts){
				$no = ($inquirieProducts->no == 0)? "":$inquirieProducts->no; 
				$price = ($inquirieProducts['Products']['retail_price'] == 0)? "":$inquirieProducts['Products']['retail_price']; 
				$data[] = ["ProductID"=>$inquirieProducts->id, "no" => $no, "name"=> $inquirieProducts['Products']['product_name'], "maker_type_ref"=>$inquirieProducts['Products']['type_model'], "partno"=>$inquirieProducts['Products']['sku'], "unit"=>$inquirieProducts['Products']['unit'], "quantity"=>$inquirieProducts->quantity,"price"=>$price,"remark"=>$inquirieProducts->remark];
				// $total = $total + $price;
			}
		}else {
			foreach ($inquiry->inquirie_products as $inquirieProducts){
				$no = ($inquirieProducts->no == 0)? "":$inquirieProducts->no; 
				$price = ($inquirieProducts->price == 0)? "":$inquirieProducts->price; 
				$data[] = ["ProductID"=>$inquirieProducts->id, "no" => $no, "name"=> $inquirieProducts->name, "maker_type_ref"=>$inquirieProducts->maker_type_ref, "partno"=>$inquirieProducts->partno, "unit"=>$inquirieProducts->unit, "quantity"=>$inquirieProducts->quantity,"price"=>$price,"remark"=>$inquirieProducts->remark];
				$count = $count + $inquirieProducts->assign;
				// $total = $total + $price;
			}
		}

		$data = json_encode($data);
		$user_id = $InquirieSupplier->Users->find('list',[ 'keyField' => 'id', 'valueField' => 'username' ]);
		$supplier_id = $InquirieSupplier->Suppliers->find('list',[ 'keyField' => 'id', 'valueField' => 'name' ]);

		$this->set(compact('inqSuppliers','inquiry','data','count', 'user_id','supplier_id'));
	}

	public function InquiriesSuppliers($id) {
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		
		$inqSuppliers = $InquirieSupplier->find()->contain([
			'Suppliers' => function ($q) {
				return $q->autoFields(false)->select(['id','name']);
			},
			'Users' => function ($q) {
				return $q->autoFields(false)->select(['id','username']);
			},
			'InquirieSupplierProducts' => function ($q) {
				return $q->autoFields(false)->select(['InquirieSupplierProducts.id','InquirieSupplierProducts.inquirie_supplier_id']);
			}
		])->where(['inquiry_id' => $id])->toarray();
		
		$inquiry = $this->Inquiries->getInfo($id);
		
		$total1 = $this->Inquiries->InquirieProducts->find()->where(['inquiry_id' => $id,'level' => 1])->count();
		
		// $total = 0;
		$count = 0;
		if ($inquiry->type == AVAILABLE) {
			foreach ($inquiry->inquirie_products as $inquirieProducts){
				$no = ($inquirieProducts->no == 0)? "":$inquirieProducts->no; 
				$price = ($inquirieProducts['Products']['retail_price'] == 0)? "":$inquirieProducts['Products']['retail_price']; 
				$data[] = ["ProductID"=>$inquirieProducts->id, "no" => $no, "name"=> $inquirieProducts['Products']['product_name'], "maker_type_ref"=>$inquirieProducts['Products']['type_model'], "partno"=>$inquirieProducts['Products']['sku'], "unit"=>$inquirieProducts['Products']['unit'], "quantity"=>$inquirieProducts->quantity,"price"=>$price,"remark"=>$inquirieProducts->remark];
				// $total = $total + $price;
			}
		}else {
			foreach ($inquiry->inquirie_products as $inquirieProducts){
				$no = ($inquirieProducts->no == 0)? "":$inquirieProducts->no; 
				$price = ($inquirieProducts->price == 0)? "":$inquirieProducts->price; 
				$data[] = ["ProductID"=>$inquirieProducts->id, "no" => $no, "name"=> $inquirieProducts->name, "maker_type_ref"=>$inquirieProducts->maker_type_ref, "partno"=>$inquirieProducts->partno, "unit"=>$inquirieProducts->unit, "quantity"=>$inquirieProducts->quantity,"price"=>$price,"remark"=>$inquirieProducts->remark];
				$count = $count + $inquirieProducts->assign;
				// $total = $total + $price;
			}
		}

		$data = json_encode($data);
		$user_id = $InquirieSupplier->Users->find('list',[ 'keyField' => 'id', 'valueField' => 'username' ]);
		$supplier_id = $InquirieSupplier->Suppliers->find('list',[ 'keyField' => 'id', 'valueField' => 'name' ]);

		$this->set(compact('inqSuppliers','inquiry','data','count','total1', 'user_id','supplier_id'));
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
				$data[] = ["ProductID"=> $QuotationProducts->id, "no" => $qp['no'], "name"=> $qp['name'], "maker_type_ref"=>$qp['maker_type_ref'], "partno"=>$qp['partno'], "unit"=>$qp['unit'], "quantity"=>$qp['quantity'],"price"=>$QuotationProducts->price,"remark"=>$qp['remark']];
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
			if (!empty($inqSuppliers->inquirie_supplier_products)) {
				foreach ($inqSuppliers->inquirie_supplier_products as $QuotationProducts){
					$qp = $QuotationProducts['inquirie_products'];
					$data[] = ["ProductID"=> $QuotationProducts->id, "no" => $qp['no'], "name"=> $qp['name'], "maker_type_ref"=>$qp['maker_type_ref'], "partno"=>$qp['partno'], "unit"=>$qp['unit'], "quantity"=>$qp['quantity'],"price"=>$QuotationProducts->price,"delivery_time"=>$QuotationProducts->delivery_time,"remark"=>$QuotationProducts->remark];
				}
			}
			
			$data = json_encode($data);
			$main_id = $InquirieProduct->find('list',['keyField'=>'main','valueField'=>'name'])->where(['inquiry_id' => $inqSuppliers->inquiry['id'], 'level' => 0]);
			
			$this->set(compact('inqSuppliers','main_id','count','data'));
			$this->render('/Element/Inquiries/supplier_details');
		}
	}

	public function AddInqSupplier($id){
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		$this->request->data['inquiry_id'] = $id;
		$inqSupp = $InquirieSupplier->newEntity();
		if ($this->request->is('post')) {
			$inqSupp = $InquirieSupplier->patchEntity($inqSupp, $this->request->data);
			if ($InquirieSupplier->save($inqSupp)) {
				return $this->redirect(['action' => 'inquiries-suppliers', $id]);
			} else {
			}
		}
	}

	public function DelInqSupplier($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$InquirieSupplier = TableRegistry::get('inquirie_suppliers');
		$inqSupp = $InquirieSupplier->get($id);
		if ($InquirieSupplier->delete($inqSupp)) {
			return $this->redirect(['action' => 'inquiries-suppliers', $inqSupp->inquiry_id]);
		} else {
			return $this->redirect(['action' => 'inquiries-suppliers', $inqSupp->inquiry_id]);
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
	
	public function ChooseAll($inquiry_id, $supplier_id){
		$InquirieProduct = TableRegistry::get('inquirie_products');
		$InqSupProd = TableRegistry::get('inquirie_supplier_products');
		$inquiryproducts = $InquirieProduct->find()->select('id')->where(['inquiry_id'=>$inquiry_id,'level'=>1]);
		$data = array();
		foreach ($inquiryproducts as $key => $inquiryproduct) {
			if (!$InqSupProd->exists(['inquirie_supplier_id' => $supplier_id, 'inquirie_product_id' => $inquiryproduct->id])) {
				$data[$key]['inquirie_supplier_id'] = $supplier_id;
				$data[$key]['inquirie_product_id']  = $inquiryproduct->id;
			}
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
		$inqSuppliers = $this->Inquiries->query3($id);
		$list = ['LowestPrice'=>'Lowest Price','HightPrice'=>'Hight Price'];
		foreach ($inqSuppliers as $key => $value) {
			$list[$value->supplier['id']] = $value->supplier['name']; 
		}
		// End list supplier
		$this->set(compact('inquiryproducts','inqSuppliers','id','list'));
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
	
	public function quotations($id) {
		$inquiries = $this->Inquiries->query1($id);
		// pr($inquiries);die();
		$data = '';
		if (!empty($inquiries->inquirie_products)) {
			foreach ($inquiries->inquirie_products as $inquirie_product){
				if (!empty($inquirie_product->inquirie_supplier_products)) {
					$price = $inquirie_product->inquirie_supplier_products[0]['price']; $remark = $inquirie_product->inquirie_supplier_products[0]['remark'];
					$no = $inquirie_product->no; $delivery_time = $inquirie_product->inquirie_supplier_products[0]['delivery_time'];
				}else{
					$no = ''; $price = ''; $delivery_time = ''; $remark = '';
				}
				$data[] = ["ProductID"=> $inquirie_product->id, "no" => $no, "name"=> $inquirie_product->name, "maker_type_ref"=>$inquirie_product->maker_type_ref, "partno"=>$inquirie_product->partno, "unit"=>$inquirie_product->unit, "quantity"=>$inquirie_product->quantity,"price"=>$price,"delivery_time"=>$delivery_time,"remark"=>$remark];
			}
		}
		$inquiry = $this->Inquiries->getInfo($id);
		$InquirieSupplier = TableRegistry::get('InquirieSuppliers');
		$user_id = $InquirieSupplier->Users->find('list',[ 'keyField' => 'id', 'valueField' => 'username' ]);
		$data = json_encode($data);
		$this->set(compact('inquiries','data','inquiry','user_id'));
		
	}

	public function SelectPrice($inquiry_id) {
		switch ($this->request->data['choose']) {
			case 'LowestPrice':
				# LowestPrice
				$result = $this->Inquiries->query6($inquiry_id);
				break;
			case 'HightPrice':
				$result = $this->Inquiries->query7($inquiry_id);
				break;
			default:
				$result = $this->Inquiries->query8($inquiry_id, $this->request->data['choose']);
				break;
		}
		if ($result) {
			$this->Flash->success(__('The inquiry has been saved.'));
		} else {
			$this->Flash->error(__('The inquiry could not be saved. Please, try again.'));
		}
		return $this->redirect(['action' => 'comparing', $inquiry_id]);
	}
}
	