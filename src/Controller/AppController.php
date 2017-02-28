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

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Custom');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        
        switch($this->request->session()->read('Config.language')) {
            case "vn":
                I18n::locale('vn_VN');
                break;
            default:
                I18n::locale('en_US');
                break;
        }

        $this->loadComponent('Auth', [
            'authorize' => [
                'Acl.Actions' => ['actionPath' => 'controllers/']
            ],
            'loginAction' => [
                'plugin' => false,
                'controller' => 'Users',
                'action' => 'logout'
            ],
            'loginRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
            ],
            'authError' => __('You are not authorized to access that location.'),
            'unauthorizedRedirect' => [
                // 'controller' => 'Users',
                'action' => 'index',
                'prefix' => false
            ],
            'flash' => [
                'element' => 'error'
            ]
        ]);
    }

    public $components = [
        'Acl' => [ 'className' => 'Acl.Acl' ]
    ];

    public $helpers = [
        'Html' => [
            'className' => 'Bootstrap.BootstrapHtml',
            'useFontAwesome' => true 
        ],
        'Form' => [
            'className' => 'Bootstrap.BootstrapForm',
            'useCustomFileInput' => true
        ],
        'Paginator' => [
            'className' => 'Bootstrap.BootstrapPaginator'
        ],
        'Modal' => [
            'className' => 'Bootstrap.BootstrapModal'
        ],
        'MyHtml' => [
            'className' => 'MyHtml'
        ]
    ];
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event) {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        // Default deny
        return false;
    }

    public function beforeFilter(Event $event)  {
     
        // if ($this->Auth->user('group_id') == ADMIN) {
            $this->Auth->allow();
        // }
        $language = $this->request->session()->read('Config.language');
        $this->Auth->allow(['index','display','logout','changeLang']); 
        $user_info = $this->Auth->user();
        $this->menu();
        $this->set(compact('user_info','language'));
    }
    //...
    public function changeLang($lang) {
        $this->request->session()->write('Config.language', $lang);
        return $this->redirect($this->request->referer());
    }

    private function menu() {
        $Categorie  = TableRegistry::get('Categories');
        $Article  = TableRegistry::get('Articles');
        $categories = $Categorie->find('threaded')->where(['type' => VERTICAL])->order(['created' => 'ASC']);
        $categories2 = $Categorie->find('threaded')->where(['type' => HORIZONTAL])->order(['created' => 'ASC']);
        $help = $Article->find('list',[ 'keyField' => 'id', 'valueField' => 'title' ])->where(['type' => ARTICLE_HELP] );
        $snj = $Article->find('list',[ 'keyField' => 'id', 'valueField' => 'title' ])->where(['type' => ARTICLE_SNJ]) ;
        $my_acc = $Article->find('list',[ 'keyField' => 'id', 'valueField' => 'title' ])->where(['type' => ARTICLE_MYACCOUNT]);
        $this->set(compact('categories','categories2','help','snj','my_acc'));
    }
}
