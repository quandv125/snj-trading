<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Stocks Controller
 *
 * @property \App\Model\Table\StocksTable $Stocks
 */
class StocksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => [ 
        //         'Users' => function ($q) {
        //             return $q->autoFields(false)->select(['id','username']);
        //         },
        //         'StockProducts' => function ($q) {
        //             return $q->autoFields(false)->select(['StockProducts.id','StockProducts.quantity','StockProducts.discount','StockProducts.price','StockProducts.stock_id','StockProducts.product_id','Products.id','Products.sku','Products.product_name','Products.supply_price'])->innerJoinWith('Products');
        //         },
        //         'Suppliers' => function ($q) {
        //             return $q->autoFields(false)->select(['id','name']);
        //         },
        //     ],
        //     'limit' => LIMIT,
        //     'order' => [ 'code' => 'desc' ]
        // ];
        $total_price = $this->Stocks->find()->select(['final_price' => 'SUM(Stocks.final_price)'])->first();
        // $stocks      = $this->paginate($this->Stocks);
        $stocks      = $this->Stocks->getInfosSearch(Null);
        $Suppliers   = TableRegistry::get('Suppliers');
        $suppliers   = $Suppliers->find('list');
        $users       = $this->Stocks->Users->find('list',[ 'keyField' => 'id', 'valueField' => 'username' ]);
        $this->set(compact('stocks','total_price','users','suppliers'));
        $this->set('_serialize', ['stocks']);
    }

    /**
     * View method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stock = $this->Stocks->get($id, [
            'contain' => ['Users', 'StockProducts']
        ]);

        $this->set('stock', $stock);
        $this->set('_serialize', ['stock']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stock = $this->Stocks->newEntity();
        if ($this->request->is('post')) {
            $stock = $this->Stocks->patchEntity($stock, $this->request->data);
            if ($this->Stocks->save($stock)) {
                $this->Flash->success(__('The stock has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stock could not be saved. Please, try again.'));
            }
        }
        $Categories = TableRegistry::get('Categories');
        $Suppliers  = TableRegistry::get('Suppliers');
        $categories = $Categories->find('treeList', [ 'valuePath' => 'name', 'spacer' => ' __ ' ]);
        $suppliers  = $Suppliers->find('list');
        $users      = $this->Stocks->Users->find('list',[ 'keyField' => 'id', 'valueField' => 'username' ]);
        $this->set(compact('stock', 'users','categories','suppliers'));
        $this->set('_serialize', ['stock']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stock = $this->Stocks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stock = $this->Stocks->patchEntity($stock, $this->request->data);
            if ($this->Stocks->save($stock)) {
                $this->Flash->success(__('The stock has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stock could not be saved. Please, try again.'));
            }
        }
        $users = $this->Stocks->Users->find('list', ['limit' => 200]);
        $this->set(compact('stock', 'users'));
        $this->set('_serialize', ['stock']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stock = $this->Stocks->get($id);
        if ($this->Stocks->delete($stock)) {
            $this->Flash->success(__('The stock has been deleted.'));
        } else {
            $this->Flash->error(__('The stock could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function AddStocks(){
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $Stock                   = TableRegistry::get('Stocks');
            $Product                 = TableRegistry::get('Products');
            $StockProduct            = TableRegistry::get('StockProducts');
            $datasourceStocks        = $Stock->connection();
            $datasourceProducts      = $Product->connection();
            $datasourceStockProducts = $StockProduct->connection();
            try {
                $datasourceStocks->begin();
                $datasourceProducts->begin();
                $datasourceStockProducts->begin();
                $this->request->data['stocks'][0]['code']    = $this->Stocks->MaxCode();
                $this->request->data['stocks'][0]['actions'] = 1;
                $stock = $Stock->newEntity();
                $stock = $Stock->patchEntity($stock, $this->request->data['stocks'][0]);
                $Stock->save($stock);
                $stock_id = $stock->id;
                foreach ($this->request->data['products'] as $key => $products) {
                    $data = ['product_id' => $products['id'],'stock_id' => $stock_id,'quantity' => $products['quantity'],'discount' => $products['discount'],'price' => $products['price']];
                    $stockproduct = $StockProduct->newEntity();
                    $stockproduct = $StockProduct->patchEntity($stockproduct, $data);
                    $StockProduct->save($stockproduct);
                    $qty = $Product->findById($products['id'])->select(['id','quantity'])->first();
                    $quantity = $qty->quantity + $products['quantity'];
                    $result = $Product->updateAll(
                        ['supply_price' => $products['price'],'quantity' => $quantity],
                        ['id' => $products['id']]
                    );
                }
                $this->Flash->success(__('The stock has been saved.'));
                $datasourceStocks->commit();
                $datasourceProducts->commit();
                $datasourceStockProducts->commit();
            } catch (Exception $e) {
                $datasourceStocks->rollback();
                $datasourceProducts->rollback();
                $datasourceStockProducts->rollback();
                $this->Flash->error(__('The stock could not be deleted. Please, try again.'));
                throw $e;
            }
        }
    }

    public function SearchStocks() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $str_rand = $this->request->data['str_rand'];
            switch ($this->request->data['type']) {
                case 'created':
                    $start_days = str_replace('/', '-', trim(explode('-', $this->request->data['keyword'])[0]));
                    $end_days   = str_replace('/', '-', trim(explode('-', $this->request->data['keyword'])[1]));
                    $conditions = function ($exp, $q) use ($start_days, $end_days) {
                        return $exp->between('Stocks.created', $start_days, $end_days);
                    };
                break;
                case 'final_price':
                    $conditions = [$this->request->data['type'].' >=' => $this->request->data['keyword_s'], $this->request->data['type'].' <=' => $this->request->data['keyword_e']];
                break;
                default:
                    $conditions = [ $this->request->data['type'].' LIKE "%'.$this->request->data['keyword'].'%"'];
                break;
            }
            $stocks      = $this->Stocks->getInfosSearch($conditions);
            $total_price = $this->Stocks->find()->select(['final_price' => 'SUM(Stocks.final_price)'])->where($conditions)->first();
            $this->set(compact('stocks','total_price','str_rand'));
            $this->render('/Element/Stocks/result_searchbox');
        }
    }

    public function StocksDetail() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $conditions = ['Stocks.id'=> $this->request->data['id']];
            $stocks     = $this->Stocks->getInfosSearch($conditions);
            $this->set('id',$this->request->data['pid']);
            $this->set(compact('stocks'));
            $this->render('/Element/Products/stocks_detail');
        }
    }

     public function ChangeStocksProducts($id, $discount) {
        $Stock                   = TableRegistry::get('Stocks');
        $Product                 = TableRegistry::get('Products');
        $StockProduct            = TableRegistry::get('StockProducts');
        $this->request->data['supply_price'] = str_replace(',', '', $this->request->data['supply_price']);
        $datasourceStocks        = $Stock->connection();
        $datasourceProducts      = $Product->connection();
        $datasourceStockProducts = $StockProduct->connection();
            try {
                $datasourceStocks->begin();
                $datasourceProducts->begin();
                $datasourceStockProducts->begin();
                $result = $StockProduct->updateAll(
                    ['quantity' => $this->request->data['quantity'],'discount' => $this->request->data['discount'],'price' => $this->request->data['supply_price']], 
                    ['id' => $id]
                ); 
                $this->UpdateStocks($this->request->data['sid']);
                $datasourceStocks->commit();
                $datasourceProducts->commit();
                $datasourceStockProducts->commit();
            } catch (Exception $e) {
                $datasourceStocks->rollback();
                $datasourceProducts->rollback();
                $datasourceStockProducts->rollback();
                throw $e;
        }     
        return $this->redirect(['action' => 'index']);
    }

    public function DeleteStockProduct() {
        if ($this->request->is('Ajax')) {
            $this->autoRender = false;
            $StockProduct = TableRegistry::get('StockProducts');
            foreach ($this->request->data['stockproducts'] as $key => $stockproducts) {
                $id = $stockproducts['stock_product_id'];
                $stockproducts = $StockProduct->get($id);
                $StockProduct->delete($stockproducts);
            }
            $this->UpdateStocks($this->request->data['id']);
        }
    }

    private function UpdateStocks($id) {
        $StockProduct = TableRegistry::get('StockProducts');
        $stock_product = $StockProduct->find()->select(['total_quantity' => 'SUM(StockProducts.quantity)','total_price' => 'SUM(StockProducts.quantity * (StockProducts.price - (StockProducts.price * (StockProducts.discount / 100))))'])->where(['stock_id'=> $id])->first();
        $discount_stock = $this->Stocks->find()->select(['discount_stock'])->where(['id' => $id])->first();
        $final_price = $stock_product->total_price - ($stock_product->total_price * ($discount_stock->discount_stock / 100));
        $this->Stocks->updateAll(
            ['total_quantity' => $stock_product->total_quantity,'final_price' => $final_price,'total_price' => $stock_product->total_price], 
            ['id' => $id]
        );
    }
    
}
