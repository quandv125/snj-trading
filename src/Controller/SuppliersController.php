<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Suppliers Controller
 *
 * @property \App\Model\Table\SuppliersTable $Suppliers
 */
class SuppliersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $suppliers = $this->paginate($this->Suppliers);

        $this->set(compact('suppliers'));
        $this->set('_serialize', ['suppliers']);
    }

    /**
     * View method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplier = $this->Suppliers->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('supplier', $supplier);
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplier = $this->Suppliers->newEntity();
        if ($this->request->is('post')) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->data);
            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('supplier'));
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplier = $this->Suppliers->get($id, [
            'contain' => []
        ]);
        // pr($this->request->data);die();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->data);
            if ($this->Suppliers->save($supplier)) {
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('supplier'));
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplier = $this->Suppliers->get($id);
        if ($this->Suppliers->delete($supplier)) {
            $this->Flash->success(__('The supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;

            $Supplier = TableRegistry::get('Suppliers');
           
            $str_rand = $this->request->data['str_rand'];
            $tbl = $this->request->data['tbl'];
            $key = $this->request->data['key'];

            $suppliers = $Supplier->find()->where([ $tbl.' LIKE' => '%'. $key . '%'])->toarray();
            $this->set(compact('suppliers','str_rand'));
            $this->render('/Element/Suppliers/result_searchbox');
        }
    }

     public function AddSuppliers()    {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $this->request->data['gender'] = 1;
            $Suppliers  = TableRegistry::get('Suppliers');
            $supplier   = $Suppliers->newEntity();
            $supplier   = $Suppliers->patchEntity($supplier, $this->request->data);
            if ($Suppliers->save($supplier)) {
                $id = $supplier->id;
                $message = array('status' => true, 'message' => __('The Suppliers has been saved.'),'id' => $id);
            } else {
                $message = array('status' => false, 'message' => __('The Suppliers could not be saved. Please, try again.'));
            }
            echo json_encode($message); exit();
        }
    }
}
