<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController
{

	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index()
	{
		$this->paginate = [
			'contain' => [ 
				'Invoices' => function ($q) {
					return $q->autoFields(false)->select(['Invoices.id','Invoices.user_id','Invoices.customer_id','Invoices.total','Invoices.created','Users.id','Users.username'])->innerJoinWith('Users');
				},
			],
			'limit' => LIMIT,
			'order' => [ 'code' => 'desc' ]
		];
		$customers = $this->paginate($this->Customers);

		$this->set(compact('customers'));
		$this->set('_serialize', ['customers']);
	}

	/**
	 * View method
	 *
	 * @param string|null $id Customer id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$customer = $this->Customers->get($id, [
			'contain' => ['Invoices', 'Payments']
		]);

		$this->set('customer', $customer);
		$this->set('_serialize', ['customer']);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$customer = $this->Customers->newEntity();
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$customer = $this->Customers->patchEntity($customer, $this->request->data);
			if ($this->Customers->save($customer)) {
				$id = $customer->id;
			}
			echo $id; exit();
		} else {
			$customer = $this->Customers->patchEntity($customer, $this->request->data);
			if ($this->Customers->save($customer)) {
				$this->Flash->success(__('The customer has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The customer could not be saved. Please, try again.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		$this->set(compact('customer'));
		$this->set('_serialize', ['customer']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Customer id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$customer = $this->Customers->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$customer = $this->Customers->patchEntity($customer, $this->request->data);
			if ($this->Customers->save($customer)) {
				$this->Flash->success(__('The customer has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The customer could not be saved. Please, try again.'));
			}
		}
		$this->set(compact('customer'));
		$this->set('_serialize', ['customer']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Customer id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$customer = $this->Customers->get($id);
		if ($this->Customers->delete($customer)) {
			$this->Flash->success(__('The customer has been deleted.'));
		} else {
			$this->Flash->error(__('The customer could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

	public function search() {
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$Customer = TableRegistry::get('Customers');
			$str_rand = $this->request->data['str_rand'];
			$tbl = $this->request->data['tbl'];
			$key = $this->request->data['key'];
			switch ($tbl) {
				case 'id':
					$conditions = [ $tbl => $key];
					break;
				default:
					$conditions = [ $tbl.' LIKE' => '%'. $key . '%'];
					break;
			}
			$customers = $Customer->find()->where($conditions);
			
			$this->set(compact('customers','str_rand'));
			$this->render('/Element/Customers/result_searchbox');
		}
	}
	
}
