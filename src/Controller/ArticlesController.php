<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{

	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index()
	{
		$this->paginate = [
			'contain' => ['Categories']
		];
		$articles = $this->paginate($this->Articles);
		  $categories = $this->Articles->Categories->find('list', ['limit' => 200])->where(['type' => HORIZONTAL ]);
		$this->set(compact('articles','categories'));
		$this->set('_serialize', ['articles']);
	}

	/**
	 * View method
	 *
	 * @param string|null $id Article id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$article = $this->Articles->get($id, [
			'contain' => ['Categories']
		]);

		$this->set('article', $article);
		$this->set('_serialize', ['article']);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$article = $this->Articles->newEntity();
		if ($this->request->is('post')) {
			if (isset($this->request->data['pictures']) && !empty($this->request->data['pictures'])) {
				$path = rand(1,100000).'_'.$this->request->data['pictures']['name'];
				if(move_uploaded_file($this->request->data['pictures']['tmp_name'], ARTICLES.$path)){
					$thumbnail = $this->Custom->CreateNameThumb($this->request->data['pictures']['name']);
					$this->Custom->generate_thumbnail(ARTICLES.$path, $thumbnail, 250);
					$this->request->data['pictures']   = 'articles/'.$path;
					$this->request->data['thumbnails']   = 'thumbnails/'.$thumbnail;
				}
			} else {  
				$this->request->data['pictures'] = null; 
				$this->request->data['thumbnails'] = null;
			}
			$article = $this->Articles->patchEntity($article, $this->request->data);

			if ($this->Articles->save($article)) {
				$this->Flash->success(__('The article has been saved.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The article could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Articles->Categories->find('list', ['limit' => 200])->where(['type' => HORIZONTAL ]);
		$this->set(compact('article', 'categories'));
		$this->set('_serialize', ['article']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Article id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$article = $this->Articles->get($id, [
			'contain' => []
		]);
		// 
		if ($this->request->is(['patch', 'post', 'put'])) {
			if (isset($this->request->data['files']) && !empty($this->request->data['files'])) {
				$path = rand(1,100000).'_'.$this->request->data['files']['name'];
				if(move_uploaded_file($this->request->data['files']['tmp_name'], ARTICLES.$path)){
					$thumbnail = $this->Custom->CreateNameThumb($this->request->data['files']['name']);
					$this->Custom->generate_thumbnail(ARTICLES.$path, $thumbnail, 250);
					$this->request->data['pictures']    = 'articles/'.$path;
					$this->request->data['thumbnails']  = 'thumbnails/'.$thumbnail;
				}
			}
			$article = $this->Articles->patchEntity($article, $this->request->data);
			
			if ($this->Articles->save($article)) {
				$this->Flash->success(__('The article has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The article could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Articles->Categories->find('list', ['limit' => 200])->where(['type' => HORIZONTAL ]);
		$this->set(compact('article', 'categories'));
		$this->set('_serialize', ['article']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Article id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$article = $this->Articles->get($id);
		if ($this->Articles->delete($article)) {
			$this->Flash->success(__('The article has been deleted.'));
		} else {
			$this->Flash->error(__('The article could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
	private function menu() {
		$Categorie  = TableRegistry::get('Categories');
		$categories = $Categorie->find('threaded')->where(['type' => 0]);
		$categories2 = $Categorie->find('threaded')->where(['type' => 1]);
		$this->set(compact('categories','categories2'));
	}

	public function details($id){
		$this->viewBuilder()->layout('product');
		$articles = $this->Articles->find()->where(['id' => $id])->first();
		$Categorie  = TableRegistry::get('Categories');
		$list_articles = $Categorie->find()->contain([
			'Articles' => function ($q) {
				return $q->autoFields(false)->select(['id','categorie_id'])->where(['type' => ARTICLE_CATEGORIES]);
			},
		])->where(['Categories.type' => HORIZONTAL]);
		$this->set(compact('articles','list_articles'));
	}

	public function articlecategory($id){
		$this->viewBuilder()->layout('product');
		$Categorie  = TableRegistry::get('Categories');
		$articles = $this->Articles->find()->where(['categorie_id' => $id, ['type' => ARTICLE_CATEGORIES]]);
		$list_articles = $Categorie->find()->contain([
			'Articles' => function ($q) {
				return $q->autoFields(false)->select(['id','categorie_id'])->where(['type' => ARTICLE_CATEGORIES]);
			}
		])->where(['Categories.type' => HORIZONTAL]);
		$this->set(compact('articles','list_articles'));
	}
}
