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
        $Product  = TableRegistry::get('Products');
        $User  = TableRegistry::get('Users');
        $actived = $Product->find()->where(['Products.actived' => false])->count();
        $users = $User->find()->count();
        $path = func_get_args();
        $count = count($path);
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
        $this->set(compact('page', 'subpage','actived','users'));
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
            $category_id = $this->request->query['type-search'];
            if ($category_id != null) {
                $conditions = ['Products.actived'=> PRODUCT_ACTIVE,'Products.product_name LIKE' => '%'. $keyword .'%', 'Products.categorie_id' => $category_id];
                $conditions2 = ['Products.actived'=> PRODUCT_ACTIVE,'Products.sku LIKE' => '%'. $keyword .'%', 'Products.categorie_id' => $category_id];
            } else {
                $conditions = ['Products.actived'=> PRODUCT_ACTIVE,'Products.product_name LIKE' => '%'. $keyword .'%'];
                $conditions2 = ['Products.actived'=> PRODUCT_ACTIVE,'Products.sku LIKE' => '%'. $keyword .'%'];
            }
            $Supplier   = TableRegistry::get('Suppliers');
            $suppliers  = $Supplier->find('list',['keyField' => 'id', 'valueField' => 'name' ]);
            $products   = $this->Pages->getInfoSearch($conditions, $conditions2);
            $this->set(compact('products','keyword','suppliers'));
        }
    }

    public function categoriesParent($id) {
        $this->viewBuilder()->layout('product');
        $Categorie  = TableRegistry::get('Categories');
        $list       = $Categorie->find('list')->where(['parent_id' => $id]);
        // $list       = $Categorie->find('threaded')->contain([
        //     'Products' => function ($q) {
        //         return $q->autoFields(false)->select(['id','categorie_id']);
        //     }
        // ])->where(['parent_id' => $id])->toarray();
        $arr = array();
        foreach ($list as $key => $value) {
            $arr[] = $key;
        }
        $conditions = ['Products.categorie_id IN' => $arr ];
        $cat_list   = $Categorie->find('children', ['for' => $id])->find('threaded')->toArray();
        $products   = $this->Pages->getInfoProducts($conditions);
        $this->set(compact('categories','products','cat_list','id'));
    }

    public function categories($parent_id, $id) {
        $this->viewBuilder()->layout('product');
        $Categorie  = TableRegistry::get('Categories');
        $Supplier   = TableRegistry::get('Suppliers');
        $conditions = ['Products.categorie_id ' => $id ];
        $products   = $this->Pages->getInfoProducts($conditions);
        $category = $Categorie->find()->select(['id','name'])->contain([
            'Products' => function ($q) {
                return $q->autoFields(false)->select(['id','categorie_id','product_name']);
            },
        ])->where(['parent_id' => $parent_id, 'actived' => true]);
       
        $suppliers    = $Supplier->find('list',[ 'keyField' => 'id', 'valueField' => 'name' ]);
        $this->set(compact('products','category','suppliers','parent_id'));
    }

    public function products($id) {
        $this->viewBuilder()->layout('product');
        $product = $this->Pages->getOneProducts(['Products.id ' => $id ]);
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
        $User  = TableRegistry::get('Users');
        $users = $User->find()->where(['id' => $this->Auth->user('id')])->first();
        $this->set(compact('users'));
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
        $products   = $this->Pages->getProducts($conditions);
        $this->set(compact('products'));
    }

    public function ViewCart()    {
        $this->viewBuilder()->layout('product');
    }

    public function contacts() {
        $this->viewBuilder()->layout('product');
    }
}
