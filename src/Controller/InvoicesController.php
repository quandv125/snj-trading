<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;
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

    public function InvoiceDetail($id) {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $id = $this->request->data['id'];
            $conditions = ['Invoices.id' => $id];
            $this->getInfo($conditions);
            $this->render('/Element/Invoices/invoice_detail');
        }
        $conditions = ['Invoices.id' => $id];
        $this->getInfo($conditions);
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
                    return $q->autoFields(false)->select(['InvoiceProducts.id','InvoiceProducts.remark','InvoiceProducts.price','InvoiceProducts.quantity','InvoiceProducts.invoice_id','InvoiceProducts.product_id','Products.id','Products.sku','Products.product_name','Products.retail_price','Products.unit','Products.user_id'])
                    ->innerJoinWith('Products');
                },
                'Unavailables' => function ($q) {
                    return $q->autoFields(false)->select(['Unavailables.id','Unavailables.part_no','Unavailables.product_name','Unavailables.vessel_name','Unavailables.engine_type','Unavailables.engine_maker','Unavailables.model_serial_no','Unavailables.description','Unavailables.remark','Unavailables.quantity','Unavailables.unit','Unavailables.invoice_id']);
                }
                // 'Customers',
                // 'Outlets',
                // 'Coupons',
                // 'Payments',
                // 'PartnerDeliverys'
            ],
            'fields' => ['Invoices.id','Invoices.code','Invoices.user_id','Invoices.create_by','Invoices.status','Invoices.customer_id','Invoices.outlet_id','Invoices.coupon_id','Invoices.profit','Invoices.vessel','Invoices.imo_no','Invoices.maker_type_ref','Invoices.note','Invoices.payment_id','Invoices.partner_delivery_id','Invoices.delivery_cost','Invoices.packing_cost','Invoices.insurance_cost','Invoices.note','Invoices.discount','Invoices.note','Invoices.created','CreateBy.username','CreateBy.email','Users.username'],
            'conditions' => $conditions,
            'order' => ['Invoices.created'  => 'DESC'],
            'limit' => LIMIT
        ];
        $invoices  = $this->paginate($this->Invoices);
       
        //$total     = $this->Invoices->find()->select(['final_price'=>'SUM(Invoices.total)','total_paid' => 'SUM(Invoices.customers_paid)'])->first();
        $users     = $this->Invoices->Users->find('list',[ 'keyField' => 'id', 'valueField' => 'username', 'limit' => 200]);
        $deliverys = $this->Invoices->PartnerDeliverys->find('list',[ 'keyField' => 'value', 'valueField' => 'name', 'limit' => 200]);
      
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]);
        $this->set(compact('invoices','users','customers','deliverys'));
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
        $InvoiceProduct = TableRegistry::get('InvoiceProducts');
        $InvoiceProduct->query()->delete()->where(['invoice_id' => $id])->execute();
        if ($this->Invoices->delete($invoice)) {
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller'=>'pages','action' => 'orders']);
    }

    public function ChangeInvoicesProducts() {
        if ($this->request->is('Ajax')) {
            $this->autoRender = false;
            $Inquiry = TableRegistry::get('Inquiries');
            $InquirieProduct = TableRegistry::get('InquirieProducts');
            
            unset($this->request->data['data'][count($this->request->data['data'])-1]);
            $data = [
                'status'        => '1',
                'type'          => UNAVAILABLE,
                'customer_id'   => $this->Auth->user('id'),
                'vessel'        => $this->request->data['vessel'],
                'imo_no'        => $this->request->data['imo_no'],
                'ref'           => $this->request->data['ref'],
                'description'   => $this->request->data['description']
            ];
          
            if (!empty($this->Auth->user('id'))) {
              
                $inquiry = $Inquiry->newEntity();
                $inquiry = $Inquiry->patchEntity($inquiry, $data);
                $Inquiry->save($inquiry);
                $inquiry_id = $inquiry->id;
                foreach ($this->request->data['data'] as $key => $inq) {
                    $inq['inquiry_id']      = $inquiry->id;
                    $inq['product_id']      = null;
                    $inq['name']            = $inq[1];
                    $inq['maker_type_ref']  = $inq[2];
                    $inq['partno']          = $inq[3];
                    $inq['unit']            = $inq[4];
                    $inq['quantity']        = $inq[5];
                    $inq['price']           = $inq[6];
                    $inq['amount']          = $inq[7];
                    $inq['remark']          = $inq[8];
                    $inq['status']          = 1;
                    $inquirieproduct = $InquirieProduct->newEntity();
                    $inquirieproduct = $InquirieProduct->patchEntity($inquirieproduct, $inq);
                    $InquirieProduct->save($inquirieproduct);
                }
                $msg = array('status' => true, 'message' => __('OK'));
            } else {
                $msg = array('status' => false, 'message' => __('NO.'));
            }
        }
       
        $test = $Inquiry->find();
        pr($test->toarray());
        die();
        // $Invoice = TableRegistry::get('Invoices');
        // $InvoiceProduct = TableRegistry::get('InvoiceProducts');
        // $User = TableRegistry::get('Users');
        // $invoices = $Invoice->find()->contain([
        //     // 'Users' => function ($q) {
        //     //     return $q->autoFields(false)->select(['id','username']);
        //     // },
        //     'InvoiceProducts' => function ($q) {
        //         return $q->autoFields(false)->select(['InvoiceProducts.id','InvoiceProducts.price','InvoiceProducts.quantity','InvoiceProducts.invoice_id','InvoiceProducts.product_id','Products.id','Products.sku','Products.product_name','Products.user_id','Users.id','Users.username','Users.email'])
        //             ->leftJoin('Products','Products.id = InvoiceProducts.product_id')
        //             ->leftJoin('Users', 'Users.id = Products.user_id')
        //             ->where(['Products.user_id' => $this->Auth->user('id')]);
        //     },
        // ])->select(['Invoices.id','Invoices.code','Invoices.user_id','Invoices.create_by','Invoices.status','Invoices.customer_id','Invoices.outlet_id','Invoices.coupon_id','Invoices.payment_id','Invoices.partner_delivery_id','Invoices.total','Invoices.customers_paid','Invoices.money','Invoices.return_money','Invoices.discount','Invoices.note','Invoices.created'])
        // ->where(['Invoices.id' => $id])
        // ->order(['Invoices.created'  => 'DESC'])->toarray();
        // $this->loadModel('Users');
        // $invoice_id = 34;
        // $users = [5,2];
        // foreach ($users as $key => $id) {
        //     $query = $this->Users->find('all');
        //     $query->join([
        //         'Products' =>[
        //             'table' => 'Products',
        //             'type' => 'INNER',
        //             'conditions' => 'Users.id = Products.user_id'
        //         ],
        //         'invoice_products' =>[
        //             'table' => 'invoice_products',
        //             'type' => 'INNER',
        //             'conditions' => 'Products.id = invoice_products.product_id'
        //         ],   
        //         'categories' =>[
        //             'table' => 'categories',
        //             'type' => 'INNER',
        //             'conditions' => 'categories.id = Products.categorie_id'
        //         ],     
        //     ])
        //     ->select(['Users.id','Users.username','Users.email','Products.id','Products.product_name','Products.serial_no','Products.type_model','Products.origin','Products.retail_price','invoice_products.id','invoice_products.invoice_id','invoice_products.quantity','invoice_products.remark','categories.name'])
        //     ->where(['invoice_products.invoice_id' => $invoice_id,'Products.user_id' => $id])
        //     ->order(['Users.id' => 'ASC'])
        //     ->group(['invoice_products.id']);
        //     $email = $query->toarray()[0]['email'];
        //     $html = '';
        //     foreach ($query as $key => $value) {
        //         $html .='<tr class="cart_item">
        //                 <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
        //                     <span class="">'.($key+1).'</span>
        //                 </td>
        //                 <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
        //                     '.$value["Products"]["product_name"].'
        //                 </td>
        //                 <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
        //                     '.$value["categories"]["name"].'
        //                 </td>
        //                 <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
        //                     '.$value["Products"]["serial_no"].'
        //                 </td>
        //                 <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
        //                     '.$value["Products"]["type_model"].'
        //                 </td>
        //                 <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
        //                     '.$value["Products"]["origin"].'
        //                 </td>
        //                 <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
        //                     '.$value["Products"]["retail_price"].'
        //                 </td>
        //                 <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
        //                     <div class="info-qty" id="0">
        //                         <span class="qty-val">
        //                             '.$value["invoice_products"]["quantity"].'
        //                         </span>
        //                     </div>          
        //                 </td>
        //                 <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">  
        //                     '.$value["invoice_products"]["remark"].' 
        //                 </td>
        //             </tr>';
        //     }
        //     $this->sendUserEmail($email,'inquiry', $html, 'inquiry');
        // }
        // echo $email;
        // die();
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

    public function sendUserEmail($to, $subject, $msg, $temp) {
       $email = new Email('default');
       $email->transport('gmail')
            ->template($temp)
            ->from(['snjtrading2017@gmail.com' => 'S&J Trading Company'])
            ->to($to)
            ->subject($subject)
            ->emailFormat('html')
            ->viewVars(['value' => $msg])
            ->send($msg); 
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

    public function orders() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            pr($this->request->data);die();
            if (empty($this->Auth->user())) {
                $msg = array('status' => false, 'message' => __('You must login before order.'));
                echo json_encode($msg); exit();
            } 
            $data = [
                'code'    => '1',
                'status'  => '1',
                'user_id' => $this->Auth->user('id'),
            ];
            if (!empty($this->Auth->user('id'))) {
                $Invoice        = TableRegistry::get('Invoices');
                $InvoiceProduct = TableRegistry::get('InvoiceProducts');
                $invoice = $Invoice->newEntity();
                $invoice = $Invoice->patchEntity($invoice, $data);
                $Invoice->save($invoice);
                $invoice_id = $invoice->id;
                foreach ($this->request->data['products'] as $key => $products) {
                    $products['invoice_id'] = $invoice_id;
                    $invoiceproduct = $InvoiceProduct->newEntity();
                    $invoiceproduct = $InvoiceProduct->patchEntity($invoiceproduct, $products);
                    $InvoiceProduct->save($invoiceproduct);
                }
                $msg = array('status' => true, 'message' => __('OK'));
                $this->request->session()->delete('Cart');
                $this->request->session()->delete('my_cart');
            } else {
                $msg = array('status' => false, 'message' => __('NO.'));
            }
            $this->sendUserEmail('quandv.125@gmail.com','New Order', 'You have new Order', 'default');
            echo json_encode($msg); exit();
        }
    }

    public function check_user(){
        if (empty($this->Auth->user())) {
            return $this->redirect(['controller'=>'pages','action' => 'login']);
        }
    }
    public function inquiry(){
        $this->viewBuilder()->layout('product');
        $this->check_user();
        $Invoice = TableRegistry::get('Invoices');
        
        $inquiry = $Invoice->find()->contain([
            'Users' => function ($q) {
                return $q->autoFields(false)->select(['id','username']);
            },
            'InvoiceProducts' => function ($q) {
                return $q->autoFields(false)->select(['InvoiceProducts.id','InvoiceProducts.invoice_id','InvoiceProducts.product_id','Products.id'])
                    ->leftJoin('Products','Products.id = InvoiceProducts.product_id')
                    ->where(['Products.user_id' => $this->Auth->user('id')]);
            },
        ])->select(['Invoices.id','Invoices.code','Invoices.user_id','Invoices.status','Invoices.customer_id','Invoices.note','Invoices.created'])
        ->where(['Invoices.status' => 3])
        ->order(['Invoices.created'  => 'DESC']);
       $this->set(compact('inquiry'));
    }

    public function inqDetails($id)    {
        $this->viewBuilder()->layout('product');
        $this->check_user();
        $Invoice = TableRegistry::get('Invoices');
        
        $inquiry = $Invoice->find()->contain([
            'InvoiceProducts' => function ($q) {
                return $q->autoFields(false)->select(['InvoiceProducts.id','InvoiceProducts.price','InvoiceProducts.quantity','InvoiceProducts.remark','InvoiceProducts.invoice_id','InvoiceProducts.product_id','Products.id','Products.sku','Products.product_name','Products.serial_no','Products.type_model','Products.origin','Products.retail_price','Products.user_id','Users.id','Users.username','Users.email','Categories.id','Categories.name'])
                    ->leftJoin('Products','Products.id = InvoiceProducts.product_id')
                    ->leftJoin('Users', 'Users.id = Products.user_id')  
                    ->leftJoin('Categories', 'Categories.id = Products.categorie_id')
                    ->where(['Products.user_id' => $this->Auth->user('id')]);
            }
        ])->select(['Invoices.id','Invoices.code','Invoices.user_id','Invoices.status','Invoices.delivery_cost','Invoices.packing_cost','Invoices.insurance_cost','Invoices.note','Invoices.created'])
        ->where(['Invoices.id' => $id])
        ->order(['Invoices.created'  => 'DESC'])->first();
        $this->set(compact('inquiry'));
    }

    public function updateOrders(){
       if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $InvoiceProduct = TableRegistry::get('InvoiceProducts');
          
            $invoice = $this->Invoices->get($this->request->data['invoice_id']);
            if ($invoice->status < 3) {
                foreach ($this->request->data['items'] as $key => $item) {
                    $InvoiceProduct->updateAll(['quantity' => $item['quantity'], 'remark' => $item['remark']], ['id' => $item['invoice_product_id']]);
                }
                echo 'ok';
            } else {
                echo 'error';
            }
        }
    }

    public function delItems() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $InvoiceProduct = TableRegistry::get('InvoiceProducts');
            $invoiceproduct = $InvoiceProduct->get($this->request->data['id']);
            $invoice = $this->Invoices->get($invoiceproduct->invoice_id);
            if ($invoice->status < 3) {
                if ($InvoiceProduct->delete($invoiceproduct)) {
                    if (!$InvoiceProduct->exists(['invoice_id' => $invoiceproduct->invoice_id])) {
                        if ($this->Invoices->delete($invoice)) {
                            echo 'delete all';
                        } 
                    }
                    echo 'ok';
                } else {
                    echo 'error';
                }
            } else {
                echo 'error';
            }
        }
    }

    public function UpdateInvoices() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $result = $this->Invoices->updateAll(['status' => 2,'profit' => $this->request->data['profit'],'delivery_cost' => $this->request->data['delivery_cost'],'packing_cost' => $this->request->data['packing_cost'], 'insurance_cost' => $this->request->data['insurance_cost'],'note' => $this->request->data['note']], ['id' => $this->request->data['id']]);

            $invoices = $this->Invoices->getInfo($this->request->data['id'])->toarray();

            $html = $this->Invoices->sendordertocustomer($this->request->data, $invoices);
            $email = $invoices['Users']['email'];
            $this->sendUserEmail($email,'order #'.$this->request->data['id'], $html, 'orders');
        }
    }

    public function SendInvoicesSupplier() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $users = explode(',', $this->request->data['user']);
            $users = str_replace("[","",$users);
            $users = str_replace("]","",$users);
          
            $this->loadModel('Users');
            $invoice_id = $this->request->data['id'];
            foreach ($users as $key => $id) {
                $query = $this->Users->find('all');
                $query->join([
                    'products' =>[
                        'table' => 'products',
                        'type' => 'INNER',
                        'conditions' => 'Users.id = products.user_id'
                    ],
                    'invoice_products' =>[
                        'table' => 'invoice_products',
                        'type' => 'INNER',
                        'conditions' => 'products.id = invoice_products.product_id'
                    ],   
                    'categories' =>[
                        'table' => 'categories',
                        'type' => 'INNER',
                        'conditions' => 'categories.id = products.categorie_id'
                    ],     
                ])
                ->select(['Users.id','Users.username','Users.email','products.id','products.product_name','products.serial_no','products.type_model','products.origin','products.retail_price','invoice_products.id','invoice_products.invoice_id','invoice_products.quantity','invoice_products.remark','categories.name'])
                ->where(['invoice_products.invoice_id' => $invoice_id,'products.user_id' => trim($id)])
                ->order(['Users.id' => 'ASC'])
                ->group(['invoice_products.id']);
                $email = $query->toarray()[0]['email'];
                $html = '';
                foreach ($query as $key => $value) {
                    $html .='<tr class="cart_item">
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                <span class="">'.($key+1).'</span>
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                '.$value["products"]["product_name"].'
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                '.$value["categories"]["name"].'
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                '.$value["products"]["serial_no"].'
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                '.$value["products"]["type_model"].'
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                '.$value["products"]["origin"].'
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                '.$value["products"]["retail_price"].'
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">
                                <div class="info-qty" id="0">
                                    <span class="qty-val">
                                        '.$value["invoice_products"]["quantity"].'
                                    </span>
                                </div>
                            </td>
                            <td class="text-center" style="border: 1px solid #e5e5e5 !important;color: #555;text-align: center;margin: 0;">  
                                '.$value["invoice_products"]["remark"].' 
                            </td>
                        </tr>';
                }
                $this->sendUserEmail($email,'inquiry #'.$invoice_id, $html, 'inquiry');
            }
            $result = $this->Invoices->updateAll(['status' => 3], ['id' => $this->request->data['id']]);
        }
    } // End function

    public function unavailable() {
        $this->viewBuilder()->layout('product');
        // $this->check_user();
    }

    public function unavailables()    {
        if ($this->request->is('Ajax')) {
            $this->autoRender = false;
           
            $invoice_data = [
                'code'    => '1',
                'status'  => '1',
                'type'    => '1',
                'user_id' => $this->Auth->user('id'),
                'vessel' => $this->request->data['vessel_name'],
                'imo_no' => $this->request->data['imo_no'],
                'maker_type' => $this->request->data['maker_type'],
                'note' => $this->request->data['note']
            ];
            
            if (!empty($this->Auth->user('id'))) {
                $Invoice        = TableRegistry::get('Invoices');
                $Unavailable = TableRegistry::get('Unavailables');
                $invoice = $Invoice->newEntity();
                $invoice = $Invoice->patchEntity($invoice, $invoice_data);

                $Invoice->save($invoice);
                $invoice_id = $invoice->id;

                foreach ($this->request->data['unavailables'] as $key => $data) {
                    $data['invoice_id'] = $invoice_id;
                    $unavailable = $Unavailable->newEntity();
                    $unavailable = $Unavailable->patchEntity($unavailable, $data);

                    if ($Unavailable->save($unavailable)) {
                    //     $this->Flash->success(__('The orders has been saved.'));
                    // } else {
                    //     $this->Flash->error(__('The orders could not be saved. Please, try again.'));
                    }
                }
                $msg = array('status' => true, 'message' => __('OK'));
            } else {
                $msg = array('status' => false, 'message' => __('NO.'));
            }

            // $this->sendUserEmail('quandv.125@gmail.com','New Order', 'You have new Order', 'default');
            echo json_encode($msg); exit();
        }
    }
}
