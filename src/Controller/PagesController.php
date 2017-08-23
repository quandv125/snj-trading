<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

	/**
	 * Displays a view
	 *
	 * @return void|\Cake\Network\Response
	 * @throws \Cake\Network\Exception\NotFoundException When the view file could not
	 *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
	 */
	public function display()
	{
		if (empty($this->Auth->user())) {
			return $this->redirect(['controller'=>'Pages','action' => 'login']);
		}
		$Product 	= TableRegistry::get('Products');
		$Inquiry	= TableRegistry::get('Inquiries');
		$User		= TableRegistry::get('Users');
		$actived	= $Product->find()->where(['Products.actived' => false])->count();
		$order		= $Inquiry->find()->where(['Inquiries.status' => 1])->count();
		$users		= $User->find()->count();
		$path		= func_get_args();
		$count		= count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = null;
		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		$this->set(compact('page', 'order','actived','users'));
		try {
			$this->render(implode('/', $path));
		} catch (MissingTemplateException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	public function index() {
		$this->viewBuilder()->layout('layout03');
	}

	public function search(){
		$this->viewBuilder()->layout('product');
		if ($this->request->is('get')) {
			$keyword    = $this->request->query['search'];
			$c_id = $this->request->query['type-search'];
			if ($c_id != null) {
				$conditions  = ['Products.actived'=>PRODUCT_ACTIVE,'Products.product_name LIKE'=>'%'. $keyword .'%', 'Products.categorie_id'=>$c_id];
				$conditions2 = ['Products.actived'=>PRODUCT_ACTIVE,'Products.sku LIKE'=>'%'. $keyword .'%', 'Products.categorie_id'=>$c_id];
			} else {
				$conditions  = ['Products.actived'=>PRODUCT_ACTIVE,'Products.product_name LIKE'=>'%'. $keyword .'%'];
				$conditions2 = ['Products.actived'=>PRODUCT_ACTIVE,'Products.sku LIKE'=>'%'. $keyword .'%'];
			}
			$Supplier   = TableRegistry::get('Suppliers');
			$suppliers  = $Supplier->find('list',['keyField' => 'id', 'valueField' => 'name' ]);
			$products   = $this->Pages->getInfoSearch($conditions, $conditions2);
			$this->set(compact('products','keyword','suppliers'));
		}
	}

	private function gettreelist($childrens, $id) {
		$myarr = array($id => $id);
		foreach ($childrens as $key => $children) {
			$myarr[$children->id] = $children->id;
			if (!empty($children->children)) {
				foreach ($children->children as $key => $child) {
					$myarr[$child->id] = $child->id;
				}
			}
		}
		return $myarr;
	}

	public function categoriesParent($id) {
		$this->viewBuilder()->layout('product');
		$Categorie  = TableRegistry::get('Categories');
		// $Supplier   = TableRegistry::get('Suppliers');
		// $info       = $Categorie->find()->select(['id','name'])->where(['id' => $id])->first();
		// $cat_list   = $Categorie->find('children', ['for' => $id])->find('threaded')->toArray();
		// $arr        = $this->gettreelist($cat_list, $id);
		// $products   = $this->Pages->getInfoProducts(['Products.categorie_id IN' => $arr ]);
		// $suppliers  = $Supplier->find('list',[ 'keyField' => 'id', 'valueField' => 'name' ]);

		$category = $Categorie->find('children', ['for' => $id])->find('threaded')->contain([
			'Products' => function ($q) { return $q->autoFields(false)->select(['id','categorie_id','product_name']); }
		])->select(['id','name','parent_id','picture'])->where(['actived' => true]);
		$this->set(compact('id','category'));
		// $this->set(compact('id','info','products','cat_list','suppliers','category'));
	}

	public function categories($parent_id, $id) { 
		$this->viewBuilder()->layout('product');
		$Categorie  = TableRegistry::get('Categories');
		// $Supplier   = TableRegistry::get('Suppliers');
		// $info       = $Categorie->find()->select(['id','name'])->where(['id' => $id])->first();
		// $conditions = ['Products.categorie_id ' => $id ];
		$products   = $this->Pages->getInfoProducts(['Products.categorie_id ' => $id ]);
		// $suppliers  = $Supplier->find('list',[ 'keyField' => 'id', 'valueField' => 'name' ]);
		$category 	= $Categorie->find('children', ['for' => $parent_id])->find('threaded')->contain([
			'Products' => function ($q) { return $q->autoFields(false)->select(['id','categorie_id','product_name']); }
		])->select(['id','name','parent_id','picture'])->where(['actived' => true]);
		
		$this->set(compact('products','category','parent_id'));
	}

	public function products($id) {
		$this->viewBuilder()->layout('product');
		$product 	= $this->Pages->getOneProducts(['Products.id ' => $id ]);
		$conditions = ['Products.categorie_id' => $product->categorie_id ];
		$products   = $this->Pages->getInfoProducts($conditions);
		$this->set(compact('product','products'));
	}
	
	public function suppliers($id) {
		$this->viewBuilder()->layout('product');
		$conditions = ['Products.user_id' => $id ];
		$products   = $this->Pages->getInfoProducts($conditions);
		$this->set(compact('products'));
	}
  
	public function login($username = null) {
		$this->viewBuilder()->layout('product');
		$this->set('username', $username);
	}

	public function check_user(){
		if (empty($this->Auth->user())) {
			return $this->redirect(['controller'=>'pages','action' => 'login']);
		}
	}

	public function accounts() {
		$this->check_user();
		$this->viewBuilder()->layout('product');
		// $User  = TableRegistry::get('Users');
		// $users = $User->find()->where(['id' => $this->Auth->user('id')])->first();
		// $this->set(compact('users'));
	}

	public function AccountInfo()	{
		$User  = TableRegistry::get('Users');
		$users = $User->find()->where(['id' => $this->Auth->user('id')])->first();
		echo $users;
		die();
	}

	public function PersonalInformation() {
		$this->check_user();
		$this->viewBuilder()->layout('product');
		$User  = TableRegistry::get('Users');
		$users = $User->find()->where(['id' => $this->Auth->user('id')])->first();
		$this->set(compact('users'));
	}

	public function ProductsOfSuppliers() {
		$this->check_user();
		$this->viewBuilder()->layout('product');
		$conditions = ['Products.user_id' => $this->Auth->user('id') ];
		$products   = $this->Pages->getProductsIndex($conditions, 100, NULL);
		$this->set(compact('products'));
	}

	public function ViewCart() {
		$cart = $this->request->session()->read('Cart');
		// $cart[82]['quantity'] = 11;
		// $cart[85]['quantity'] = 14;
		// $cart[86]['quantity'] = 1121;
		pr($cart);die();
		$this->viewBuilder()->layout('product');
	}

	public function contacts() {
		$this->viewBuilder()->layout('product');
	}

	public function wishlists() {
		$this->viewBuilder()->layout('product');
		$this->check_user();
		$wishlist  = TableRegistry::get('Wishlists');
		$wishlists = $wishlist->find()
			->leftJoin('products', 'products.id = Wishlists.product_id')
			->leftJoin('categories', 'categories.id = products.categorie_id')
			->leftJoin('suppliers', 'suppliers.id = products.supplier_id')
			->select(['Wishlists.id', 'Wishlists.product_id', 'Wishlists.user_id', 'products.id','products.sku','products.supplier_id','products.origin','products.quantity','products.type_model','products.serial_no','products.short_description','categories.id','categories.name','products.product_name','products.thumbnail', 'suppliers.id','suppliers.name'])
			->where(['Wishlists.user_id' => $this->Auth->user('id')]);
		$this->set(compact('wishlists'));
	}

	public function orders() {
		$this->viewBuilder()->layout('product');
		$this->check_user();
		$Invoice  = TableRegistry::get('Invoices');
		$orders = $Invoice->find()->select([ 'id', 'code', 'status', 'created']) ->where(['user_id' => $this->Auth->user('id')])->order(['created' => 'DESC']);
		$this->set(compact('orders'));
	}

	public function OrderDetails($id){
		$this->viewBuilder()->layout('product');
		$this->check_user();
		$Invoice  = TableRegistry::get('Invoices');
		$orders = $Invoice->find()->contain([
			'InvoiceProducts' => function ($q) {
				return $q->autoFields(false)->select(['InvoiceProducts.id','InvoiceProducts.remark','InvoiceProducts.quantity','InvoiceProducts.invoice_id','InvoiceProducts.product_id','products.id','products.quantity','products.serial_no','products.type_model','products.origin','products.product_name','products.retail_price','products.thumbnail','categories.id','categories.name',])
				->leftJoin('products', 'products.id = InvoiceProducts.product_id')
				->leftJoin('categories', 'categories.id = products.categorie_id');
			},
			'Unavailables' => function ($q) {
				return $q->autoFields(false)->select(['Unavailables.id','Unavailables.part_no','Unavailables.product_name','Unavailables.vessel_name','Unavailables.engine_type','Unavailables.engine_maker','Unavailables.model_serial_no','Unavailables.description','Unavailables.remark','Unavailables.quantity','Unavailables.invoice_id']);
			}
		])->select(['Invoices.id','Invoices.code','Invoices.status','Invoices.created','Invoices.profit','Invoices.delivery_cost','Invoices.packing_cost','Invoices.insurance_cost','Invoices.vessel','Invoices.imo_no','Invoices.maker_type_ref','Invoices.note'])->where(['Invoices.id' => $id])->order(['Invoices.created'=>'DESC'])->first();
		$this->set(compact('orders'));
	}

	public function getcartdata()	{
		if ($this->request->is('get')) {
			$cart    = $this->request->session()->read('Cart');
			echo json_encode($cart);
		}
		exit();
	}
}


