<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{


    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['searchproduct','paginationproducts']);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $User = TableRegistry::get('Users');
        if ($this->Auth->user('group_id') == CUSTOMERS) {
            return $this->redirect(['action' => 'suppliers']);
        }
        $products = $this->Products->getProductsSearch(null, null, null);  
       
        $users = $User->find('list',[ 'keyField' => 'id', 'valueField' => 'username' ])->where(['group_id'=> CUSTOMERS]);
        $this->infoPagi(null, 1);
        $this->set(compact('products','users'));
        $this->set('_serialize', ['products']);
    }

    public function suppliers() {
        $conditions = ['Products.user_id' => $this->Auth->user('id')];
        $products   = $this->Products->getProductsSearch($conditions, null, null);  
        $User       = TableRegistry::get('Users');
        $users      = $User->find('list',[ 'keyField' => 'id', 'valueField' => 'username' ])->where(['group_id'=> CUSTOMERS]);
        $this->infoPagi($conditions, 1);
        $this->set(compact('products','users'));
        $this->set('_serialize', ['products']);
    }
    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Categories', 'Outlets', 'Suppliers', 'Images', 'InvoiceProducts', 'StockProducts']
        ]);
        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $Image   = TableRegistry::get('Images');
        $Product = TableRegistry::get('Products');
        $this->request->data['retail_price']    = str_replace(',', '', $this->request->data['retail_price']);
        // $this->request->data['wholesale_price'] = str_replace(',', '', $this->request->data['wholesale_price']);
        // $this->request->data['supply_price']    = str_replace(',', '', $this->request->data['supply_price']);
        if (empty($this->request->data['sku'])) {
           $this->request->data['sku'] = $this->Products->MaxSKU();
        }
        $this->request->data['actived'] = true;
        $this->request->data['user_id'] = $this->Auth->user('id');
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->data);
           
            if ($Product->save($product)) {
                $id = $product->id;
                if (isset($this->request->data['files']) && !empty($this->request->data['files'])) {
                    for($i=0; $i<count($this->request->data['files']); $i++){
                        $path = rand(1,100000).'_'.$this->request->data['files'][$i]['name'];
                        if(move_uploaded_file($this->request->data['files'][$i]['tmp_name'], PRODUCTS.$path)){
                            $thumbnail = $this->Custom->CreateNameThumb($this->request->data['files'][$i]['name']);
                            $this->Custom->generate_thumbnail(PRODUCTS.$path, $thumbnail, 180);
                            $images = $Image->newEntity();
                            $images->product_id  =  $id;
                            $images->path        = 'products/'.$path;
                            $images->thumbnail   = 'thumbnails/'.$thumbnail;
                            $Image->save($images);
                            if ($i == 0) {
                                $pic = 'products/'.$path;
                                $thumb = 'thumbnails/'.$thumbnail;
                            }
                        }
                    }
                    $Product->updateAll(['picture' => $pic, 'thumbnail' => $thumb], ['id' => $id]);
                }
                $this->Flash->success(__('The product has been saved.'));
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }
    }

    public function SupplierAddProduct() {
        $Categorie  = TableRegistry::get('Categories');
        $Image      = TableRegistry::get('Images');
        $Product    = TableRegistry::get('Products');
        if ($this->request->is('post')) {

            $this->request->data['retail_price'] = str_replace(',', '', $this->request->data['retail_price']);
            $this->request->data['actived'] = 0;
            if (empty($this->request->data['sku'])) {
               $this->request->data['sku'] = $this->Products->MaxSKU();
            }
            $this->request->data['user_id'] = $this->Auth->user('id');
            $product = $this->Products->newEntity();
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($Product->save($product)) {
                $id = $product->id;
                if (isset($this->request->data['files']) && !empty($this->request->data['files'])) {
                    for($i=0; $i<count($this->request->data['files']); $i++){
                        $path = rand(1,100000).'_'.$this->request->data['files'][$i]['name'];
                        if(move_uploaded_file($this->request->data['files'][$i]['tmp_name'], PRODUCTS.$path)){
                            $thumbnail = $this->Custom->CreateNameThumb($this->request->data['files'][$i]['name']);
                            $this->Custom->generate_thumbnail(PRODUCTS.$path, $thumbnail, 180);
                            $images = $Image->newEntity();
                            $images->product_id  =  $id;
                            $images->path        = 'products/'.$path;
                            $images->thumbnail   = 'thumbnails/'.$thumbnail;
                            $Image->save($images);
                            if ($i == 0) {
                                $pic = 'products/'.$path;
                                $thumb = 'thumbnails/'.$thumbnail;
                            }
                        }
                    }
                    $Product->updateAll(['picture' => $pic, 'thumbnail' => $thumb], ['id' => $id]);
                }
                $this->Flash->success(__('The product has been saved.'));
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
            return $this->redirect(['controller'=>'Pages','action' => 'ProductsOfSuppliers', $this->Auth->user('id')]);
        }
        $this->viewBuilder()->layout('product');
       
        $categorie  = $Categorie->find('treeList'); 
        $outlets    = $this->Products->Outlets->find('list', ['limit' => 200]);
        $suppliers  = $this->Products->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categorie', 'outlets', 'suppliers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        $this->request->data['retail_price']    = str_replace(',', '', $this->request->data['retail_price']);
        $this->request->data['wholesale_price'] = str_replace(',', '', $this->request->data['wholesale_price']);
        $this->request->data['supply_price']    = str_replace(',', '', $this->request->data['supply_price']);
        $this->request->data['actived'] = true;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            $OldID = $product->id;
            if ($this->Products->save($product)) {
                $Image = TableRegistry::get('Images');
                $id = $product->id;
                $UF = $this->request->data['files'.$OldID];
                for($i=0; $i<count($this->request->data['files'.$OldID]); $i++){
                    $path = rand(1,100000).'_'.$this->request->data['files'.$OldID][$i]['name'];
                    if(move_uploaded_file($this->request->data['files'.$OldID][$i]['tmp_name'], PRODUCTS.$path)){
                        $thumbnail = $this->Custom->CreateNameThumb($this->request->data['files'.$OldID][$i]['name']);
                        $this->Custom->generate_thumbnail(PRODUCTS.$path, $thumbnail, 180);
                        $images = $Image->newEntity();
                        $images->product_id  =  $id;
                        $images->path        = 'products/'.$path;
                        $images->thumbnail   = 'thumbnails/'.$thumbnail;
                        $Image->save($images);
                    }
                }
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $outlets    = $this->Products->Outlets->find('list', ['limit' => 200]);
        $suppliers  = $this->Products->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories', 'outlets', 'suppliers'));
        $this->set('_serialize', ['product']);
    }

    public function SupplierEditProduct($id = null){
        $this->viewBuilder()->layout('product');
        $Categorie  = TableRegistry::get('Categories');
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $Image = TableRegistry::get('Images');
                $id = $product->id;
                if (isset($this->request->data['files']) && !empty($this->request->data['files'][0]['name'])) {
                    for($i=0; $i<count($this->request->data['files']); $i++){
                        $path = rand(1,100000).'_'.$this->request->data['files'][$i]['name'];
                        if(move_uploaded_file($this->request->data['files'][$i]['tmp_name'], PRODUCTS.$path)){
                            $thumbnail = $this->Custom->CreateNameThumb($this->request->data['files'][$i]['name']);
                            $this->Custom->generate_thumbnail(PRODUCTS.$path, $thumbnail, 180);
                            $images = $Image->newEntity();
                            $images->product_id  =  $id;
                            $images->path        = 'products/'.$path;
                            $images->thumbnail   = 'thumbnails/'.$thumbnail;
                            $Image->save($images);
                        }
                        if ($i == 0) {
                            $pic = 'products/'.$path;
                            $thumb = 'thumbnails/'.$thumbnail;
                            $this->Products->updateAll(['picture' => $pic, 'thumbnail' => $thumb], ['id' => $id]);
                        }
                    }

                }
                
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['controller'=>'pages','action' => 'ProductsOfSuppliers', $this->Auth->user('id')]);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        
        $categorie  = $Categorie->find('treeList'); 
        $outlets    = $this->Products->Outlets->find('list', ['limit' => 200]);
        $suppliers  = $this->Products->Suppliers->find('list', ['limit' => 200]);
        $products   = $this->Products->OneProductsSearch(['Products.id'=>$id], null, null);  

        $this->set(compact('products','categorie', 'outlets', 'suppliers'));
    }

    public function SupplierDeleteProduct($id = null){
        $this->viewBuilder()->layout('product');
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        $Image = TableRegistry::get('Images');
        if ($Image->exists(['product_id' => $id])) {
            $Image->query()->delete()->where(['product_id' => $id])->execute();
        }
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller'=>'pages','action' => 'ProductsOfSuppliers', $this->Auth->user('id')]);
    }
    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        $Image = TableRegistry::get('Images');
        if ($Image->exists(['product_id' => $id])) {
            $Image->query()->delete()->where(['product_id' => $id])->execute();
        }
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function addsomething() {
        // Add Outlet or Supplier in Product/index 
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if ($this->request->data['key'] == 'outlet') {
                $Outlets = TableRegistry::get('Outlets');
                $outlet = $Outlets->newEntity();
                $outlet = $Outlets->patchEntity($outlet, $this->request->data);
                if ($Outlets->save($outlet)) {
                    $id = $outlet->id;
                    $message = array('status' => true, 'message' => __('The Outlets has been saved.'),'id' => $id);
                } else {
                    $message = array('status' => false, 'message' => __('The Outlets could not be saved. Please, try again.'));
                }
                echo json_encode($message); exit();
            } else if($this->request->data['key'] == 'products') {
                $IDrand = substr( md5(time() ), 0, 15);
                $Products = TableRegistry::get('Products');
                $this->request->data['sku'] = $this->Products->MaxSKU();
                $product = $Products->newEntity();
                $product = $Products->patchEntity($product, $this->request->data);

                if ($Products->save($product)) {
                    $id = $product->id;
                    $sku = $this->request->data['sku'];
                    $message = array('status' => true, 'message' => __('The Products has been saved.'),'pid' => $id, 'id' => $IDrand,'sku'=> $sku);
                } else {
                    $message = array('status' => false, 'message' => __('The Products could not be saved. Please, try again.'));
                }
                echo json_encode($message); exit();
            } else {
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

    public function SearchProduct() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $str_rand   = $this->request->data['str_rand'];
            $conditions = $this->getConditions($this->request->data);
            $products   = $this->Products->getProductsSearch($conditions, null, null);  
            $this->infoPagi($conditions, $this->request->data['page']);
            $this->set(compact('products', 'str_rand'));
            $this->set('type',$this->request->data['type']);
            $this->render('/Element/Products/result_searchbox');
        }
    }

    public function PaginationProducts()   {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $str_rand   = $this->request->data['str_rand'];
            $limit      = $this->request->data['limit'];
            $page       = $this->request->data['page'];
            if ($this->Auth->user('group_id') == CUSTOMERS) {
                $products = $this->Products->getProductsSearch(['Products.user_id' => $this->Auth->user('id')], null, $page);
            } else {
                $products = $this->Products->getProductsSearch(null, null, $page);
            }
            $this->infoPagi(null, $page);
            $this->set(compact('products', 'str_rand'));
            $this->set('type',null);
            $this->render('/Element/Products/result_searchbox');
        }
    }

    public function PaginationProductSearch()   {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $str_rand   = $this->request->data['str_rand'];
            $limit      = $this->request->data['limit'];
            $page       = $this->request->data['page'];
            $str_rand   = $this->request->data['str_rand'];
            $conditions = $this->getConditions($this->request->data);
            $products   = $this->Products->getProductsSearch($conditions, null, $page);  
            $this->infoPagi($conditions, $page);
            $this->set(compact('products', 'str_rand'));
            $this->set('type',$this->request->data['type']);
            $this->render('/Element/Products/result_searchbox');
        }
    }

    private function infoPagi($conditions = null, $page){
        $total = $this->Products->CountProducts($conditions);
        $int_row = (int) ($total/LIMIT);
        if(($total/LIMIT) == $int_row) $num_page = $int_row;
            else $num_page = $int_row+1;
        $categories = $this->Products->Categories->find('treeList', [ 'valuePath' => 'name', 'spacer' => ' __ ' ]);
        $outlets    = $this->Products->Outlets->find('list', ['limit' => 200]);
        $suppliers  = $this->Products->Suppliers->find('list', ['limit' => 200]);
        $this->set(compact('num_page','page','categories', 'outlets', 'suppliers'));
    }

    private function getConditions($data){
            if (!empty($data['value'])) {
                switch ($data['type']) {
                    case 'sku':
                        $conditions = ['Products.sku LIKE "%'.$data['value'].'%"'];
                        break;
                    case 'product_name':
                        $conditions = ['Products.product_name LIKE' => '%'. $data['value'] .'%'];
                        break;
                    case 'categories':
                        $conditions = ['Products.categorie_id' => $data['id']];
                        break;
                    case 'user_id':
                        $conditions = [ 'Products.user_id' => $data['user_id']];
                        break;
                    case 'supplier_id':
                        $conditions = [ 'Products.supplier_id' => $data['supplier_id']];
                        break;
                    case 'actived':
                        $conditions = [ 'Products.actived' => $data['actived']];
                        break;
                    default:  // Price
                        $price = explode(';', $data['price']);
                        $conditions = [$data['type'].' <=' => $price[1], $data['type'].' >=' => $price[0]];
                        break;
                }
            } else {
                $conditions = null;
            }
        
        
        return $conditions;
    }

    public function DeleteImage() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $Image = TableRegistry::get('Images');
            $datasourceImage = $Image->connection();
            try {
                $datasourceImage->begin();
                $id = $this->request->data['id'];
                if ($Image->exists(['id' => $id])) {
                    $Image->query()->delete()->where(['id' => $id])->execute();
                }
                $datasourceImage->commit();
            } catch (Exception $e) {
                $datasourceImage->rollback();
                throw $e;
            }
        }
    }

    public function DeactiveProduct()    {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $id = $this->request->data['id'];
            $Products = TableRegistry::get('Products');
            $datasourceProduct = $Products->connection();
            try {
                $datasourceProduct->begin();
                $result = $Products->updateAll(
                    ['actived' => $this->request->data['actived']], 
                    ['id' => $id]
                ); 
                if ($result) $message = array('actived' => true, 'message' => __('The Products has been saved.'));
                 else  $message = array('actived' => false, 'message' => __('The Products could not be saved. Please, try again.'));
                $datasourceProduct->commit();
            } catch (Exception $e) {
                $datasourceProduct->rollback();
                throw $e;
            }
            echo json_encode($message); 
            exit();
        }
    }

    public function SearchStocks() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if (isset($this->request->data['deny']) && !empty($this->request->data['deny'])) $deny = $this->request->data['deny'];
                else $deny = [0];
            $conditions = [ 'Products.product_name LIKE' => '%'. $this->request->data['keyword'] . '%', 'Products.id NOT IN' => $deny];
            $str_rand   = substr( md5(time() ), 0, 15);
            $products   = $this->Products->find()->select(['id','sku','product_name','supply_price'])->where($conditions);
            $this->set(compact('products','str_rand'));
            $this->render('/Element/Stocks/searchproduct');
        }
    }

    public function QuickSearch() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $id = $this->request->data['id'];
            $conditions = ['Products.actived'=> PRODUCT_ACTIVE,'Products.product_name LIKE' => '%'. $this->request->data['keyword'] .'%'];
            $conditions2 = ['Products.actived'=> PRODUCT_ACTIVE,'Products.sku LIKE' => '%'. $this->request->data['keyword'] .'%'];
            $products   = $this->Products->getInfoSearch($conditions, $conditions2);
           
            $this->set(compact('products', 'id'));
            $this->render('/Element/Products/quick_search');
        }
    }

    public function sales() {
        $User       = TableRegistry::get('Users');
        $Customer   = TableRegistry::get('Customers');
        $users      = $User->find('list',[ 'keyField' => 'id', 'valueField' => 'username' ]);
        $customers  = $Customer->find('list',[ 'keyField' => 'id', 'valueField' => 'name' ]);
        $categories = $this->Products->Categories->find('treeList', [ 'valuePath' => 'name', 'spacer' => ' __ ' ]);
       
        if ($this->request->is('post')) {
            $products = $this->Products->find()->contain([
                'Images' => function($q){
                    return $q->autoFields(false)->select(['id','product_id','path','thumbnail']);
                }])->select(['Products.id','Products.sku','Products.product_name','Products.retail_price','Products.quantity'])
                ->where(($this->request->data['categories'] == Null)? [] : ['Products.categorie_id' => $this->request->data['categories']])
                ->order(['Products.sku' => 'DESC']);
        } else {
            $products = $this->Products->find()->contain([
                'Images' => function($q){
                    return $q->autoFields(false)->select(['id','product_id','path','thumbnail']);
                }])->select(['Products.id','Products.sku','Products.product_name','Products.retail_price','Products.quantity'])
                ->order(['Products.sku' => 'DESC']);
        }
        $this->set(compact('products', 'users', 'customers','categories'));
       
    }

    public function cart() {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $cart = $this->request->session()->read('Cart');
            if (!isset($cart)) {
                $my_cart = array();
            } else {
                $my_cart = $cart;
            }
            if (!in_array($this->request->data['id'], $my_cart)) {
                $my_cart[$this->request->data['id']] = [$this->request->data['id'],$this->request->data['name'],$this->request->data['price'],$this->request->data['picture'],];
                unset($my_cart[null]);
                $this->request->session()->write('Cart', $my_cart);
            }            
             // $this->request->session()->delete('Cart');
        }
    }

    public function RemoveItems()    {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $cart = $this->request->session()->read('Cart');
            unset($cart[$this->request->data['id']]);
            $this->request->session()->write('Cart', $cart);
        }
    }

    public function AddWishlist()  {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $Wishlist = TableRegistry::get('Wishlists');
            if (!empty($this->Auth->user('id'))) {
                $exists  = $Wishlist->find()->select(['id'])->where(['product_id'=>$this->request->data['product_id'],'user_id'=>$this->Auth->user('id') ])->first();
                if (empty($exists)) {
                    $this->request->data['user_id'] = $this->Auth->user('id');
                    $wishlist = $Wishlist->newEntity();
                    $wishlist = $Wishlist->patchEntity($wishlist, $this->request->data);
                    if ($Wishlist->save($wishlist)) {
                        echo (__('The wishlist has been saved.'));
                    } else {
                        echo (__('The wishlist could not be saved. Please, try again.'));
                    }
                }
            } else {
                echo (__('you must login to continue.'));
            }
        }
    }

    public function DeleteWishlist()  {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $Wishlist = TableRegistry::get('Wishlists');
            $datasourceWishlist = $Wishlist->connection();
            try {
                $datasourceWishlist->begin();
                $id = $this->request->data['id'];
                if ($Wishlist->exists(['id' => $id])) {
                    $Wishlist->query()->delete()->where(['id' => $id])->execute();
                }
                $datasourceWishlist->commit();
            } catch (Exception $e) {
                $datasourceWishlist->rollback();
                throw $e;
            }
        }
    }
}
