<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 */
class InvoicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->getInfo(null);
    }

    public function InvoiceDetail() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $id = $this->request->data['id'];
            $conditions = ['Invoices.id' => $id];
            $this->getInfo($conditions);
            $this->render('/Element/Invoices/invoice_detail');
        }
    }

    protected function getInfo($conditions){
        $this->paginate = [
            'join' => [
                'table' => 'users',
                'alias' => 'CreateBy',
                'type' => 'LEFT',
                'conditions' => ['Invoices.create_by = CreateBy.id']
            ],
            'contain' => [
                'Users' => function ($q) {
                    return $q->autoFields(false)->select(['id','username']);
                },
                'InvoiceProducts' => function ($q) {
                    return $q->autoFields(false)->select(['InvoiceProducts.id','InvoiceProducts.price','InvoiceProducts.quantity','InvoiceProducts.invoice_id','InvoiceProducts.product_id','Products.id','Products.sku','Products.product_name','Products.retail_price'])->innerJoinWith('Products');
                },
                'Customers',
                'Outlets',
                'Coupons',
                'Payments',
                'PartnerDeliverys'
            ],
            'fields' => ['Invoices.id','Invoices.code','Invoices.user_id','Invoices.create_by','Invoices.status','Invoices.customer_id','Invoices.outlet_id','Invoices.coupon_id','Invoices.payment_id','Invoices.partner_delivery_id','Invoices.total','Invoices.customers_paid','Invoices.money','Invoices.return_money','Invoices.discount','Invoices.note','Invoices.created','CreateBy.username','Customers.name','Users.username'],
            'conditions' => $conditions,
            'order' => ['Invoices.created'  => 'DESC'],
            'limit' => LIMIT
        ];
        $invoices  = $this->paginate($this->Invoices);
        $total     = $this->Invoices->find()->select(['final_price' => 'SUM(Invoices.total)','total_paid' => 'SUM(Invoices.customers_paid)'])->first();
        $users     = $this->Invoices->Users->find('list',[ 'keyField' => 'id', 'valueField' => 'username', 'limit' => 200]);
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]);
        $this->set(compact('invoices','users','customers','total'));
        $this->set('_serialize', ['invoices']);
    }
    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => ['Users', 'Customers', 'Outlets', 'Coupons', 'Payments', 'PartnerDeliverys', 'InvoiceProducts']
        ]);

        $this->set('invoice', $invoice);
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $InvoiceProduct = TableRegistry::get('InvoiceProducts');
        $Invoice        = TableRegistry::get('Invoices');
        $this->request->data['invoices'][0]['code'] = $this->Invoices->MaxCode();
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $invoice = $Invoice->newEntity();
            $invoice = $Invoice->patchEntity($invoice, $this->request->data['invoices'][0]);
            $Invoice->save($invoice);
            $invoice_id = $invoice->id;
            foreach ($this->request->data['products'] as $key => $products) {
                $products['invoice_id'] = $invoice_id;
                $invoiceproduct = $InvoiceProduct->newEntity();
                $invoiceproduct = $InvoiceProduct->patchEntity($invoiceproduct, $products);
                $InvoiceProduct->save($invoiceproduct);
            }
            $this->request->session()->delete('Invoices');
            exit();
        } else {
            $invoice = $this->Invoices->newEntity();
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->data);
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
            }
        }
        $users      = $this->Invoices->Users->find('list', ['limit' => 200]);
        $customers  = $this->Invoices->Customers->find('list', ['limit' => 200]);
        $outlets    = $this->Invoices->Outlets->find('list', ['limit' => 200]);
        $coupons    = $this->Invoices->Coupons->find('list', ['limit' => 200]);
        $payments   = $this->Invoices->Payments->find('list', ['limit' => 200]);
        $partnerDeliverys = $this->Invoices->PartnerDeliverys->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'users', 'customers', 'outlets', 'coupons', 'payments', 'partnerDeliverys'));
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->data);
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
            }
        }
        $users              = $this->Invoices->Users->find('list', ['limit' => 200]);
        $customers          = $this->Invoices->Customers->find('list', ['limit' => 200]);
        $outlets            = $this->Invoices->Outlets->find('list', ['limit' => 200]);
        $coupons            = $this->Invoices->Coupons->find('list', ['limit' => 200]);
        $payments           = $this->Invoices->Payments->find('list', ['limit' => 200]);
        $partnerDeliverys   = $this->Invoices->PartnerDeliverys->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'users', 'customers', 'outlets', 'coupons', 'payments', 'partnerDeliverys'));
        $this->set('_serialize', ['invoice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoices->get($id);
        if ($this->Invoices->delete($invoice)) {
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function ChangeInvoicesProducts($id) {
        // $Invoice                 = TableRegistry::get('Invoices');
        // $Product                 = TableRegistry::get('Products');
        // $InvoiceProduct          = TableRegistry::get('InvoiceProducts');
        // $this->request->data['price'] = str_replace(',', '', $this->request->data['price']);
        // $datasourceInvoices      = $Invoice->connection();
        // $datasourceProducts      = $Product->connection();
        // $datasourceInvoiceProducts = $InvoiceProduct->connection();
        // pr($this->request->data);die($id);
        //     try {
        //         $datasourceInvoices->begin();
        //         $datasourceProducts->begin();
        //         $datasourceInvoiceProducts->begin();
        //         // $result = $InvoiceProduct->updateAll(
        //         //     ['quantity' => $this->request->data['quantity'],'discount' => $this->request->data['discount'],'price' => $this->request->data['price']], 
        //         //     ['id' => $id]
        //         // ); 
        //         // $this->_UpdateInvoices($this->request->data['sid']);
        //         $datasourceInvoices->commit();
        //         $datasourceProducts->commit();
        //         $datasourceInvoiceProducts->commit();
        //     } catch (Exception $e) {
        //         $datasourceInvoices->rollback();
        //         $datasourceProducts->rollback();
        //         $datasourceInvoiceProducts->rollback();
        //         throw $e;
        // }     
        // return $this->redirect(['action' => 'index']);
    }
    public function DeleteInvoiceProduct() {
        if ($this->request->is('Ajax')) {
            $this->autoRender = false;
            $InvoiceProduct = TableRegistry::get('InvoiceProducts');
            foreach ($this->request->data['invoice_products'] as $key => $invoice_products) {
                $id = $invoice_products['invoice_product_id'];
                $invoiceproducts = $InvoiceProduct->get($id);
                $InvoiceProduct->delete($invoiceproducts);
            }
            $this->_UpdateInvoices($this->request->data['invoice_id']);
        }
    }

    private function _UpdateInvoices($id) {
        $InvoiceProduct = TableRegistry::get('InvoiceProducts');
        $invoice_product = $InvoiceProduct->find()->select(['total_quantity' => 'SUM(InvoiceProducts.quantity)','total' => 'SUM(InvoiceProducts.quantity * InvoiceProducts.price )'])->where(['invoice_id'=> $id])->first();
        $discount = $this->Invoices->find()->select(['discount'])->where(['id' => $id])->first();
        $customers_paid = $invoice_product->total - ($invoice_product->total * ($discount->discount / 100));
        $this->Invoices->updateAll(
            ['customers_paid' => $customers_paid,'total' => $invoice_product->total], 
            ['id' => $id]
        );
    }

    public function SearchInvoices() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $str_rand = $this->request->data['str_rand'];
            switch ($this->request->data['type']) {
                case 'created':
                    $start_days = str_replace('/', '-', trim(explode('-', $this->request->data['keyword'])[0]));
                    $end_days   = str_replace('/', '-', trim(explode('-', $this->request->data['keyword'])[1]));
                    $conditions = function ($exp, $q) use ($start_days, $end_days) {
                        return $exp->between('Invoices.created', $start_days, $end_days);
                    };
                break;
                case 'total':
                    $conditions = ['Invoices.'.$this->request->data['type'].' >=' => $this->request->data['keyword_s'], 'Invoices.'.$this->request->data['type'].' <=' => $this->request->data['keyword_e']];
                break;
                default:
                    $conditions = [ $this->request->data['type'].' LIKE "%'.$this->request->data['keyword'].'%"'];
                break;
            }
            $invoices  = $this->Invoices->getInfosSearch($conditions);
            $total  = $this->Invoices->find()->select(['final_price' => 'SUM(Invoices.total)','total_paid' => 'SUM(Invoices.customers_paid)'])->where($conditions)->first();
            $this->set(compact('invoices','total','str_rand'));
            $this->render('/Element/Invoices/result_searchbox');
        }
    }

    public function SaveInfoInvoices() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $this->request->session()->delete('Invoices');
            $this->request->session()->write('Invoices', $this->request->data);
        }
    }
}
