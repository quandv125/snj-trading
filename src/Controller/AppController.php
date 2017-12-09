<?php
namespace App\Controller;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;

class AppController extends Controller
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Custom');
		$this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');
		
		switch($this->request->session()->read('Config.language')) {
			case "en":
				I18n::locale('en_US');
				break;
			default:
				I18n::locale('kr_KR');
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
				'home',
				'prefix'=>'admin',
			],
			'logoutRedirect' => [
				'controller' => 'Pages',
				'action' => 'index',
			],
			'authError' => __('You are not authorized to access that location.'),
			'unauthorizedRedirect' => [
				'plugin' => false,
                'controller' => 'Users',
                'action' => 'login',
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
	public function beforeRender(Event $event) {
		if (!array_key_exists('_serialize', $this->viewVars) && in_array($this->response->type(), ['application/json', 'application/xml'])) {
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

		// // Any registered user can access public functions
  //       if (!$this->request->getParam('prefix')) {
  //           return true;
  //       }
  //       // Only admins can access admin functions
  //       if ($this->request->getParam('prefix') === 'admin') {
  //           return (bool)($user['role'] === 'admin');
  //       }
  //       // Default deny
  //      return false;
	}
	public function beforeFilter(Event $event)  {
		if (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin' && $this->Auth->user('group_id') != ADMIN) {
			// $this->Flash->error1(__('You are not authorized to access that location.'));
			return $this->redirect(['prefix' => false,'controller'=>'Pages','action' => 'index']);
		}
		if ($this->Auth->user('group_id') == ADMIN) {
			$this->Auth->allow();
		} else {
			$this->Auth->allow(['index','display','logout','changeLang','lostpassword','captcha','changepassword','products','register','activeacc']); 
		}
		$this->Auth->allow();
		$language = $this->request->session()->read('Config.language');
		$user_info = $this->Auth->user();
		$this->menu();
		$this->set(compact('user_info','language'));
	}
	
	public function changeLang($lang) {
		$this->request->session()->write('Config.language', $lang);
		return $this->redirect($this->request->referer());
	}
	private function menu() {
		$Categorie   = TableRegistry::get( 'Categories' );
		$categories  = $Categorie->find( 'threaded' )
			->where([ 'type' => VERTICAL, 'actived' => 1 ])
			->order([ 'name' => 'ASC' ])
			->toarray();
		$categories2 = null;
		$this->set(compact('categories','categories2'));
	}
	
	
}