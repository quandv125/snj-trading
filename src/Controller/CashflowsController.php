<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cashflows Controller
 *
 * @property \App\Model\Table\CashflowsTable $Cashflows
 */
class CashflowsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $cashflows = $this->paginate($this->Cashflows);

        $this->set(compact('cashflows'));
        $this->set('_serialize', ['cashflows']);
    }

    /**
     * View method
     *
     * @param string|null $id Cashflow id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cashflow = $this->Cashflows->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('cashflow', $cashflow);
        $this->set('_serialize', ['cashflow']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cashflow = $this->Cashflows->newEntity();
        if ($this->request->is('post')) {
            $cashflow = $this->Cashflows->patchEntity($cashflow, $this->request->data);
            if ($this->Cashflows->save($cashflow)) {
                $this->Flash->success(__('The cashflow has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cashflow could not be saved. Please, try again.'));
            }
        }
        $users = $this->Cashflows->Users->find('list', ['limit' => 200]);
        $this->set(compact('cashflow', 'users'));
        $this->set('_serialize', ['cashflow']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cashflow id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cashflow = $this->Cashflows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cashflow = $this->Cashflows->patchEntity($cashflow, $this->request->data);
            if ($this->Cashflows->save($cashflow)) {
                $this->Flash->success(__('The cashflow has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cashflow could not be saved. Please, try again.'));
            }
        }
        $users = $this->Cashflows->Users->find('list', ['limit' => 200]);
        $this->set(compact('cashflow', 'users'));
        $this->set('_serialize', ['cashflow']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cashflow id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cashflow = $this->Cashflows->get($id);
        if ($this->Cashflows->delete($cashflow)) {
            $this->Flash->success(__('The cashflow has been deleted.'));
        } else {
            $this->Flash->error(__('The cashflow could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
