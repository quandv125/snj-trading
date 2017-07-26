<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use PHPExcel_IOFactory; 
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;

//** PDF **/
require_once(ROOT.DS.'vendor'.DS.'TCPDF'.DS.'tcpdf.php');
//** Excel **//
require_once(ROOT.DS.'vendor'.DS.'PHPExcel'.DS.'Classes'.DS.'PHPExcel.php');
require_once(ROOT.DS.'vendor'.DS.'PHPExcel'.DS.'Classes'.DS.'PHPExcel'.DS.'IOFactory.php');

class UsersController extends AppController
{

	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		$this->Auth->allow('login','logout');
	}

	public function index() {
		$this->paginate = [
			'contain' => ['Groups']
		];
		$users = $this->paginate($this->Users);
		$groups = $this->Users->Groups->find('list', ['limit' => 200]);
		$this->set(compact('users','groups'));
		$this->set('_serialize', ['users']);
	}

	public function view($id = null) {
		$user = $this->Users->get($id, [
			'contain' => ['Groups', 'Cashflows', 'Invoices', 'Logs', 'Stocks']
		]);
		$this->set('user', $user);
		$this->set('_serialize', ['user']);
	}

	public function add() {
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			if (isset($this->request->data['avatars']['name']) && !empty($this->request->data['avatars']['name'])) {
				$avatars = $this->request->data['avatars'];
				$thumbnail = $this->Custom->CreateNameThumb($avatars['name']);
				$this->request->data['thumbnail'] = 'thumbnails'.DS.$thumbnail;
				$this->request->data['avatars'] = $this->request->data['avatars']['name'];
			} else {
				$this->request->data['avatars'] = Null;
			}
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));
				if (isset($avatars['name']) && !empty($avatars['name'])) {
					if(move_uploaded_file($avatars['tmp_name'],AVATARS.$avatars['name'])){
						$this->Custom->generateThumb(AVATARS.$avatars['name'], $thumbnail, 320);
					}
				}
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The user could not be saved or the username already use. Please, try again.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		$groups = $this->Users->Groups->find('list', ['limit' => 200]);
		$this->set(compact('user', 'groups'));
		$this->set('_serialize', ['user']);
	}

	public function edit($id = null) {
		$user = $this->Users->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->request->session()->write('Auth.User.fullname', $user->fullname);
				$this->Flash->success(__('The user has been saved.'));
				if ($this->Auth->user('group_id') == CUSTOMERS) {
					return $this->redirect(['controller' => 'Pages','action' => 'accounts']);
				}
				return $this->redirect(['controller'=>'Pages','action' => 'accounts']);
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->Users->Groups->find('list', ['limit' => 200]);
		$this->set(compact('user', 'groups'));
		$this->set('_serialize', ['user']);
	}

	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

	public function login() {
		$this->viewBuilder()->layout('product');
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user && $user['actived'] == true) {
				$this->Auth->setUser($user);
				$this->request->session()->write('Config.language', 'en');
				if (!$user['group_id'] == CUSTOMERS) {
					return $this->redirect($this->Auth->redirectUrl());
				} else {
					return $this->redirect(['controller'=>'Pages','action' => 'index']);
				}
			}
			$this->Flash->error1(__('Invalid username or password, try again'));
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function permission(){
		$AroAco = TableRegistry::get('ArosAcos');
		if($this->request->is('Ajax')) {
			$this->autoRender = false;
			$datasourceAroAco = $AroAco->connection();
			try {
				$datasourceAroAco->begin();
				$exists = $AroAco->find('all',['fields'=>['id'],'conditions'=>['aro_id'=>$this->request->data['aro_id'],'aco_id'=>$this->request->data['aco_id']]])->first();
				if (empty($exists)) { ## SAVE
					$aros_acos = $AroAco->newEntity();
					$aros_acos->aro_id  = $this->request->data['aro_id'];
					$aros_acos->aco_id  = $this->request->data['aco_id'];
					$aros_acos->_create = $this->request->data['checked'];
					$aros_acos->_update = $this->request->data['checked'];
					$aros_acos->_read   = $this->request->data['checked'];
					$aros_acos->_delete = $this->request->data['checked'];
					if ($AroAco->save($aros_acos)) {
						echo 'Save Successfuly!' ;
					} else {
						echo 'Error. Please, try again!';
					}
				} else { ## UPDATE
					$query = $AroAco->query();
					$data = ['_create' => $this->request->data['checked'],
							 '_update' => $this->request->data['checked'],
							 '_read'   => $this->request->data['checked'],
							 '_delete' => $this->request->data['checked']];
					$result = $query->update()->set($data)->where(['id' => $exists['id']])->execute();
					if ($result) {
						echo 'Update Successfuly!' ;
					} else {
						echo 'Error. Please, try again!';
					}
				}
				$datasourceAroAco->commit();
			} catch (Exception $e) {
				$datasourceAroAco->rollback();
				throw $e;
			}
			exit();
		}
		$Aco = TableRegistry::get('Acos');
		$Aro = TableRegistry::get('Aros');
		$this->loadModel('ArosAcos');
		$acos = $Aco->find('threaded')->contain(['Aros'])->select(['id','parent_id','alias'])->where(['actived' => true]);
		$acos_list = $Aco->find('list',[ 'keyField' => 'id', 'valueField' => 'alias' ])->where(['parent_id' => 1,'actived' => true]);
		$aros = $Aro->find('list',[ 'keyField' => 'id', 'valueField' => 'alias' ])->where(['model' => 'Groups']);
		$this->set(compact('aros','acos','acos_list'));
	}

	public function permissiondetails($id) {
		$Aco  = TableRegistry::get('Acos');
		$User = TableRegistry::get('Users');
		$acos = $Aco->find('threaded')->contain(['Aros'])->select(['id','parent_id','alias'])->where(['actived' => true]);
		$users = $User->find()
					->leftJoin('Aros', 'Users.id = Aros.foreign_key')
					->select(['Users.id','Users.username','Aros.id'])
					->where(['Users.id' => $id])->first();
		$this->set(compact('users','acos'));
	}

	public function ActiveControler() {
		$Aco = TableRegistry::get('Acos');
		if($this->request->is('Ajax')) {
			$this->autoRender = false;
			$datasourceAco = $Aco->connection();
			try {
				$datasourceAco->begin();
				$query = $Aco->query();
				$query->update()->set(['actived' => $this->request->data['checked']])->where(['id' => $this->request->data['id']])->execute();
				echo 'Update Successfuly!' ;
				$datasourceAco->commit();
			} catch (Exception $e) {
				echo 'Error. Please, try again!';
				$datasourceAco->rollback();
				throw $e;
			}
			exit();
		}
		$acos = $Aco->find('threaded')
					->select(['id','parent_id','alias','actived'])
					->where(['alias NOT IN' => ['controllers','isAuthorized','Acl','Error','Bake','Migrations']])
					->toArray();

		$this->set(compact('acos'));
	}

	public function resetaroaco() {
		if ($this->request->is('post')) {
			$Aco     = TableRegistry::get('acos');
			$ArosAco = TableRegistry::get('ArosAcos');
			$this->loadModel('ArosAcos');
			if ($this->request->data['aros'] == ARO_ADMIN) {
				$this->Flash->error(__("The Group Admin cann't reset."));
				return $this->redirect($this->request->referer());
			}
			$AroId = $this->request->data['aros'];
			$AcoId = $this->request->data['acos'];
			if (empty($AcoId)) {
				if ($ArosAco->exists(['aro_id' => $AroId])) {
					$ArosAco->query()->delete()->where(['aro_id' => $AroId])->execute();
				}
			} else {
				if ($ArosAco->exists(array('aro_id' => $AroId, 'aco_id' => $AcoId))) {
					$ArosAco->query()->delete()->where(['aro_id' => $AroId,'aco_id' => $AcoId])->execute();
				}
				$acos = $Aco->find('list')->where(['Acos.parent_id' => $AcoId]);
				if (isset($acos) && !empty($acos)) {
					foreach ($acos as $aco_id) {
						if ($ArosAco->exists(['aro_id' => $AroId, 'aco_id' => $aco_id])) {
							$ArosAco->query()->delete()->where(['aro_id' => $AroId,'aco_id' => $aco_id])->execute();
						}
					}
				}
			}
			$this->Flash->success(__('The permission has been deleted.'));
			return $this->redirect($this->request->referer());
		}
	}

	public function createpdf() {
		require_once(TCPDF_CONFIG.'tcpdf_config_extra.php');
		$users = $this->Users->find()->select(['Users.username','Users.fullname','Users.created','Groups.name'])->contain(['Groups'])->all();
		$html = '<html>
					<head></head>
					<body>
					<img src="'.IMAGE.'attachment1.jpg">
					<br/><br/><br/>
					<table class="display table" style="width: 100%; cellspacing: 0;">
					<thead>
						<tr style="font-weight: bold;">
							<th style="background-color: #e4e4e4;border:0.5px solid red;" class="text-center">#</th>
							<th style="background-color: #e4e4e4;border:0.5px solid red;" class="text-center">Username</th>
							<th style="background-color: #e4e4e4;border:0.5px solid red;" class="text-center">Fullname</th>
							<th style="background-color: #e4e4e4;border:0.5px solid red;" class="text-center">Group</th>
							<th style="background-color: #e4e4e4;border:0.5px solid red;" class="text-center">Create</th>
						</tr>
					</thead>
					<tbody>';
					foreach ($users as $key => $user) {
					$html.='
						<tr>
							<td style="border:0.5px solid red;" class="text-center">'.($key+1).'</td>
							<td style="border:0.5px solid red;" class="text-center">'.$user->username.'</td>
							<td style="border:0.5px solid red;" class="text-center">'.$user->fullname.'</td>
							<td style="border:0.5px solid red;" class="text-center">'.$user->group['name'].'</td>
							<td style="border:0.5px solid red;" class="text-center">'.$user->created.'</td>
						</tr>';
					}
					$html.= '</tbody>
					</table>
					</body>
				</html>';
		$pdf->writeHTML($html, true, 0, true, 0);
		$pdf->lastPage();
		$pdf->Output('htmlout.pdf', 'I');
	}

	public function exportexcel()   {
		// Only php5
		$users =$this->Users->find()->select(['Users.id','Users.username','Users.fullname','Users.created','Groups.name'])->contain(['Groups'])->all();
		$objTpl = PHPExcel_IOFactory::load("files/template.xls");
		$objWorksheet = $objTpl->getActiveSheet();
		$row = 2;
		$objWorksheet->insertNewRowBefore(3, count($users) -1 );
		foreach ($users as $key => $user) {
			$col = 0;
			$objWorksheet->setCellValueByColumnAndRow( $col++, $row, $user->id );
			$objWorksheet->setCellValueByColumnAndRow( $col++, $row, $user->username );
			$objWorksheet->setCellValueByColumnAndRow( $col++, $row, $user->fullname );
			$objWorksheet->setCellValueByColumnAndRow( $col++, $row, $user->group['name'] );
			$objWorksheet->setCellValueByColumnAndRow( $col++, $row, date_format($user->created,"Y/m/d H:i:s"));
			$objWorksheet->setCellValueByColumnAndRow( $col++, $row, date_format($user->created,"Y/m/d H:i:s"));
			$row++;
		}
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename=export.xlsx');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objTpl, 'Excel2007');  
		$objWriter->save('php://output');
		exit();
	}

	public function ImportExcel(){
		if($this->request->is('post')){
			if (empty($this->request->data['files']['name'])) {
			    $this->Flash->error('There are not file');
			    return $this->redirect(array('language' => $this->Session->read('Config.language'), 'action' => 'index'));
			}
			$inputFileName = $this->request->data['files']['tmp_name'];
			try {
			    $inputFileType  = PHPExcel_IOFactory::identify($inputFileName);
			    $objReader 		= PHPExcel_IOFactory::createReader($inputFileType);
			    $objPHPExcel 	= $objReader->load($inputFileName);
			} catch(Exception $e) {
			    $this->Flash->error('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
			    return $this->redirect(array('language' => $this->Session->read('Config.language'), 'action' => 'index'));
			}
			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();
			for ($row = 2; $row <= $highestRow; $row++){
			    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
			    if (isset($rowData[0][0]) && !empty($rowData[0][0])) {
			        $data[] = array(
			            'username' => $rowData[0][1],
			            'fullname' => $rowData[0][2],
			            'group_id' => $rowData[0][3]
			        );
			    }
			}
			$this->User->create();
			$this->User->saveMany($data);
			$this->Flash->success("Upload file successfully!");
			return $this->redirect(array('language' => $this->Session->read('Config.language'), 'action' => 'index'));
		}
	}

	public function register() {
		$this->viewBuilder()->layout('product');
		if ($this->request->is('post')) {
			$captcha = $this->request->session()->read('captcha');
			if (strtolower($captcha) != strtolower($this->request->data['captcha'])) {
			   $this->Flash->error1(__('captcha incorrect!'));
			} else {
				$exists = $this->Users->exists(['email' => $this->request->data['email']]);
				if ($exists == false &&  $this->request->data['password'] ==  $this->request->data['confirm_password']) {
					$code = substr( md5(time()), 0, 30);
					$this->request->data['code'] = $code;
					 $this->request->data['group_id'] = CUSTOMERS;
					$user = $this->Users->newEntity();
					$user = $this->Users->patchEntity($user, $this->request->data);
					if ($this->Users->save($user)) {
						$id = $user->id;
						$msg = ROOT_ACTIVE_ACC.$id.'/'.$code;
						$value = [$msg, $user->username];
						$this->sendUserEmail($this->request->data['email'],'Actice Accounts', $value, 'activeacc');
						$this->Flash->success1(__('The user register successfully.'));
					} else {
						$this->Flash->error1(__('The user could not be saved or the username already use. Please, try again.'));
						return $this->redirect(['controller' => 'Users','action' => 'register']);
					}
				} else {
					$this->Flash->error1(__('The password incorrect or the username already use. Please, try again.'));
					return $this->redirect(['controller' => 'Users','action' => 'register']);
				}
				return $this->redirect(['controller' => 'Pages','action' => 'login']);
			}
		}
	}

	public function sendUserEmail($to, $subject, $msg, $temp) {
	   $email = new Email('default');
	   $email->transport('gmail')
			->template($temp)
			->from(['snjtrading2017@gmail.com' => 'S&J TRADING'])
			->to($to)
			->subject($subject)
			->emailFormat('html')
			->viewVars(['value' => $msg])
			->send($msg); 
	}

	public function captcha() {
		$this->autoRender = false;
		$string = substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', 5)), 0, 5);
		// $string = substr(str_shuffle(str_repeat(rand(), 5)), 0, 5);
		$this->request->session()->write('captcha', $string);
		$font = WWW_ROOT.'css/fonts'.DS.'FreeSerif.ttf';
		$img = imagecreate(200, 50); // W H
		$white = imagecolorallocate($img, 255, 255, 255);
		$background = imagecolorallocate($img, 65, 150, 65);
		imagefilledrectangle($img, 0, 0, 200, 50, $background);
		imagettftext($img, 30, 5, 40, 43, $white, $font, $string); // IMG, SIZE
		// imageline($img, 0, 0, 300, 70, $white);
		// imageline($img, 0, 50, 200, 0, $white);
		$pixel_color = imagecolorallocate($img, 0, 0, 255);
		// for($i=0;$i<1000;$i++) {
		//     imagesetpixel($img, rand()%200, rand()%50, $pixel_color);
		// }
		imagepng($img);
		$this->response->type("image/png");
		imagedestroy($img);
	}

	public function lostpassword() {
		$this->viewBuilder()->layout('product');
		
		if ($this->request->is([ 'post'])) {
			$captcha = $this->request->session()->read('captcha');
			if (strtolower($captcha) != strtolower($this->request->data['captcha'])) {
			   $this->Flash->error1(__('captcha incorrect!'));
			} else {
				$users = $this->Users->find()->where(['email' => $this->request->data['email']])->first();
				if (!empty($users)) {
					$code = substr( md5(time()), 0, 30);$query = $this->Users->query();
					$query->update()->set(['code' => $code, 'actived' => false])->where(['id' => $users->id])->execute();
					$msg = ROOT_CHANGE_PASSWORD.$users->id.'/'.$code;
					$value = [$msg, $users->username];
					$this->sendUserEmail($this->request->data['email'],'Change Password S&J', $value, 'changepass');
					$this->Flash->success(__('Please! Check your email.'));
				}
			}
		}
	}

	public function changepassword($id = null, $code = null)    {
		$exists = $this->Users->exists(['id' => $id,'code' => $code,'actived' => false]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$hasher = new DefaultPasswordHasher();
			$password = $hasher->hash($this->request->data['password']);
			$query = $this->Users->query();
			$query->update()->set(['password' => $password, 'code'=> null, 'actived' => true])->where(['id' => $id])->execute();
			$this->Flash->success(__('The password change successfully.'));
			return $this->redirect(['controller'=>'pages','action' => 'login']);
		} elseif(!$exists){
		
			return $this->redirect(['controller'=>'pages','action' => 'login']);
		}
		$this->viewBuilder()->layout('product');
		$this->set(compact( 'id'));
	}

	public function activeacc($id, $code){
		$User = TableRegistry::get('Users');
		$exists = $this->Users->exists(['id' => $id,'code' => $code,'actived' => false]);
		$users = $User->find()->select(['id','username'])->where(['id' => $id])->first();
		if ($exists) {
			$query = $User->query();
			$query->update()->set(['actived' => true])->where(['id' => $id])->execute();
			$this->Flash->success1(__('Your email address was successfully activated.'));
	   } else {
			$this->Flash->success1(__('The user already active.'));
	   }
	   return $this->redirect(['controller'=>'pages','action' => 'login', $users->username]);
	}

	public function check_user(){
		if (empty($this->Auth->user())) {
			return $this->redirect(['controller'=>'pages','action' => 'login']);
		}
	}

	public function ChangePasswordUser(){
		$this->check_user();
		$this->viewBuilder()->layout('product');
		if ($this->request->is('post')) {
			$captcha = $this->request->session()->read('captcha');
			if (strtolower($captcha) != strtolower($this->request->data['captcha'])) {
				$this->Flash->error1(__('captcha incorrect!'));
			} else {
				if ($this->request->data['password'] == $this->request->data['confirm_password']) {
					$User = TableRegistry::get('Users');
					$datasourceUser = $User->connection();
					try {
						$datasourceUser->begin();
						$hasher = new DefaultPasswordHasher();
						$password = $hasher->hash($this->request->data['password']);
						$update = $this->Users->updateAll(['password' => $password], ['id' => $this->Auth->user('id')]);
						if ($update) {
							$this->Flash->success1(__('The password change successfully.')); 
						} else {
							$this->Flash->error1(__('Error. Please, try again!'));
						}
						$datasourceUser->commit();
					} catch (Exception $e) {
						$datasourceUser->rollback();
						throw $e;
					}
				} else {
					$this->Flash->error1(__('Password incorrect!'));
				}
			}
			return $this->redirect(['controller'=>'pages','action' => 'accounts']);
		}
	}

	public function ChangePasswordArt(){
		$this->check_user();
		$this->viewBuilder()->layout('product');
		if ($this->request->is('post')) {
			$captcha = $this->request->session()->read('captcha');
			if (strtolower($captcha) != strtolower($this->request->data['captcha'])) {
				$msg = array('status' => false, 'message' => __('Error. Captcha incorrect!'));
			} else {
				if ($this->request->data['password'] == $this->request->data['confirm_password']) {
					$User = TableRegistry::get('Users');
					$datasourceUser = $User->connection();
					try {
						$datasourceUser->begin();
						$hasher = new DefaultPasswordHasher();
						$password = $hasher->hash($this->request->data['password']);
						$update = $this->Users->updateAll(['password' => $password], ['id' => $this->Auth->user('id')]);
						if ($update) {
							$msg = array('status' => true, 'message' => __('The password change successfully.'));
						} else {
							$msg = array('status' => false, 'message' => __('Error. Please, try again!'));
						}
						$datasourceUser->commit();
					} catch (Exception $e) {
						$datasourceUser->rollback();
						throw $e;
					}
				} else {
					$msg = array('status' => false, 'message' => __('Error. Password incorrect!'));
				}
			}
			echo json_encode($msg); exit();
		}
	}

	public function ChangeUserInfoArt(){

		if ($this->request->is('post')) {
			$captcha = $this->request->session()->read('captcha');
			if (strtolower($captcha) != strtolower($this->request->data['captcha'])) {
				$msg = array('status' => false, 'message' => __('Error. Captcha incorrect!'));
			} else {
				$user = $this->Users->get($this->request->data['id'], [
					'contain' => []
				]);

				if ($this->request->is(['patch', 'post', 'put'])) {
					$user = $this->Users->patchEntity($user, $this->request->data);
					if ($this->Users->save($user)) {
						$this->request->session()->write('Auth.User.fullname', $user->fullname);
						$msg = array('status' => true, 'message' => __('The user has been saved.'));
					} else {
						$msg = array('status' => false, 'message' => __('The user could not be saved. Please, try again.'));
					}
				}
			}
			echo json_encode($msg); exit();
		}
	}
}
