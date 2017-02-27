<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * PartnerDeliverys Controller
 *
 * @property \App\Model\Table\PartnerDeliverysTable $PartnerDeliverys
 */
class PartnerDeliverysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $partnerDeliverys = $this->paginate($this->PartnerDeliverys);

        $this->set(compact('partnerDeliverys'));
        $this->set('_serialize', ['partnerDeliverys']);
    }

    /**
     * View method
     *
     * @param string|null $id Partner Delivery id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $partnerDelivery = $this->PartnerDeliverys->get($id, [
            'contain' => ['Invoices']
        ]);

        $this->set('partnerDelivery', $partnerDelivery);
        $this->set('_serialize', ['partnerDelivery']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $partnerDelivery = $this->PartnerDeliverys->newEntity();
        if ($this->request->is('post')) {
            $partnerDelivery = $this->PartnerDeliverys->patchEntity($partnerDelivery, $this->request->data);
            if ($this->PartnerDeliverys->save($partnerDelivery)) {
                $this->Flash->success(__('The partner delivery has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The partner delivery could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('partnerDelivery'));
        $this->set('_serialize', ['partnerDelivery']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Partner Delivery id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $partnerDelivery = $this->PartnerDeliverys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $partnerDelivery = $this->PartnerDeliverys->patchEntity($partnerDelivery, $this->request->data);
            if ($this->PartnerDeliverys->save($partnerDelivery)) {
                $this->Flash->success(__('The partner delivery has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The partner delivery could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('partnerDelivery'));
        $this->set('_serialize', ['partnerDelivery']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Partner Delivery id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $partnerDelivery = $this->PartnerDeliverys->get($id);
        if ($this->PartnerDeliverys->delete($partnerDelivery)) {
            $this->Flash->success(__('The partner delivery has been deleted.'));
        } else {
            $this->Flash->error(__('The partner delivery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

     public function search() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $PartnerDelivery = TableRegistry::get('PartnerDeliverys');
            $str_rand = $this->request->data['str_rand'];
            $tbl = $this->request->data['tbl'];
            $key = $this->request->data['key'];
            $partnerDeliverys = $PartnerDelivery->find()->where([ $tbl.' LIKE' => '%'. $key . '%'])->toarray();
            $this->set(compact('partnerDeliverys','str_rand'));
            $this->render('/Element/PartnerDeliverys/result_searchbox');
        }
    }
}
