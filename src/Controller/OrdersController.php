<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;
use Cake\Network\Exception\NotFoundException;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders */
class OrdersController extends AppController
{

	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index()
	{
		// $this->paginate = [
		// 	'contain' => ['OrderProducts'],
		// ];
		// $orders = $this->paginate($this->Orders);
		$orders = $this->Orders->find()->join([
			'table' => 'order_products',
			'alias' => 'OrderProducts',
			'type' => 'LEFT',
			'conditions' => ['OrderProducts.order_id = Orders.id']
		])
		->select(['Orders.id','Orders.fullname','Orders.email','Orders.status','Orders.created','total' =>'SUM(OrderProducts.price*OrderProducts.quantity)'])
		->group(['Orders.id'])
		->order(['Orders.created' => 'DESC']);
		// pr($orders->toarray());die();
		$this->set(compact('orders'));
		$this->set('_serialize', ['orders']);
	}

	/**
	 * View method
	 *
	 * @param string|null $id Order id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$order = $this->Orders->get($id, [
			'contain' => ['Users', 'OrderProducts']
		]);

		$this->set('order', $order);
		$this->set('_serialize', ['order']);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$order = $this->Orders->newEntity();
		if ($this->request->is('post')) {
			$order = $this->Orders->patchEntity($order, $this->request->data);
			if ($this->Orders->save($order)) {
				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
			}
		}
		$users = $this->Orders->Users->find('list', ['limit' => 200]);
		$this->set(compact('order', 'users'));
		$this->set('_serialize', ['order']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Order id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$order = $this->Orders->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$order = $this->Orders->patchEntity($order, $this->request->data);
			if ($this->Orders->save($order)) {
				$this->Flash->success(__('The order has been saved.'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
			}
			return $this->redirect(['action' => 'orderSummary', $id]);
		}
		$users = $this->Orders->Users->find('list', ['limit' => 200]);
		$this->set(compact('order', 'users'));
		$this->set('_serialize', ['order']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Order id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$order = $this->Orders->get($id);
		if ($this->Orders->delete($order)) {
			$this->Flash->success(__('The order has been deleted.'));
		} else {
			$this->Flash->error(__('The order could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}

	public function OrderSummary($id) {

		$Extra = TableRegistry::get('extras');
		$order = $this->Orders->find()->contain(['OrderProducts'])->leftJoin('Users','Users.id=Orders.user_id')->where(['Orders.id'=>$id])->first();
		
		$extras = $Extra->find()->select(['id','name','cost'])->where(['order_id' => $id])->toarray();
		
		$this->set(compact('extras', 'order'));
		$this->set('_serialize', ['order']);
	}

	public function ChangeStatusOrders(){
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$order = $this->Orders->get($this->request->data['id'], [
				'contain' => []
			]);
			$order = $this->Orders->patchEntity($order, $this->request->data);
			if ($this->Orders->save($order)) {
				echo (__('The order has been saved.'));
			} else {
				echo (__('The order could not be saved. Please, try again.'));
			}
			exit();
		}
	}

	public function AddTax($id)	{
		if ($this->request->is(['patch', 'post', 'put'])) {
			$Extra = TableRegistry::get('extras');
			$this->request->data['order_id'] = $id;
			$extras = $Extra->newEntity();
			$extras = $Extra->patchEntity($extras, $this->request->data);
			if ($Extra->save($extras)) {
				$this->Flash->success(__('The tax has been saved.'));
			} else {
				$this->Flash->error(__('The tax could not be saved. Please, try again.'));
			}
			return $this->redirect(['action' => 'OrderSummary', $id]);
		}
	}

	public function EditTax($id)	{
		$Extra = TableRegistry::get('extras');
		$extra = $Extra->get($id, ['contain' => []]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$extra = $Extra->patchEntity($extra, $this->request->data);
			if ($Extra->save($extra)) {
				$this->Flash->success(__('The tax has been saved.'));
			} else {
				$this->Flash->error(__('The tax could not be saved. Please, try again.'));
			}
			return $this->redirect(['action' => 'OrderSummary', $extra->order_id]);
		}
	}

	public function DeleteExtra($id)	{
		$Extra = TableRegistry::get('extras');
		$this->request->allowMethod(['post', 'delete']);
		$extra = $Extra->get($id);
		if ($Extra->delete($extra)) {
			$this->Flash->success(__('The tax has been deleted.'));
		} else {
			$this->Flash->error(__('The tax could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'OrderSummary', $extra->order_id]);
	}

	public function EditOrderProducts($id)	{
		if ($this->request->is(['patch', 'post', 'put'])) {
			$order = TableRegistry::get('order_products');
			foreach ($this->request->data as $key => $value) {
				$order->updateAll(['quantity'=> $value],['id'=>$key]);
			}
			return $this->redirect(['action' => 'OrderSummary', $id]);
		}
	}

	public function DeleteOrderProducts($id)	{
		$Order = TableRegistry::get('order_products');
		$order = $Order->get($id);
		if ($Order->delete($order)) {
			$this->Flash->success(__('The tax has been deleted.'));
		} else {
			$this->Flash->error(__('The tax could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'OrderSummary', $order->order_id]);
		
	}

	public function ChangeDelivery($id){
		if ($this->request->is(['post'])) {
			$query = $this->Orders->updateAll(['delivery_address' => json_encode($this->request->data)],['id'=>$id]);
			if ($query) {
				$this->Flash->success(__('The order has been saved.'));
			} else {
				$this->Flash->error(__('The order could not be save. Please, try again.'));
			}
			return $this->redirect(['action' => 'OrderSummary', $id]);
		}
	}
}
