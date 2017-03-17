<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //Test git
        // $this->paginate = [
        //     'contain' => ['ParentCategories']
        // ];
        // $categories = $this->paginate($this->Categories);
        $treeList = $this->Categories->find('treeList'); 
        $categories = $this->Categories->find('threaded')->toarray();
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        $this->set(compact('categories','treeList','parentCategories'));
        $this->set('_serialize', ['categories']);
    }

    public function recursion($data, $time) {
        foreach ($data as $key => $value) {
            if ($time == 0) {
                echo($value->name.'<br/>');
            } else {
                echo('____'.$value->name.'<br/>');
            }
            $this->recursion($value->children, $time+1);
        }
    }
    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['ParentCategories', 'ChildCategories']
        ]);

        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $category = $this->Categories->patchEntity($category, $this->request->data);

            if (!$this->Categories->exists(['name' => $this->request->data['name']])) {
                if ($this->Categories->save($category)) {
                    $id = $category->id;
                    $message = array('status' => true, 'message' => __('The category has been saved.') ,'id' => $id);
                } else {
                    $message = array('status' => false, 'message' => __('The category could not be saved. Please, try again.'));
                }
            } else {
                $message = array('status' =>false,'message' => __('The category could not be saved. Please, try again.'));
            }
            echo json_encode($message); exit();
        } else if ($this->request->is('post')) {
            if (!empty($this->request->data['files']['tmp_name'])) {
                $filename = rand(1,100000).'_'.$this->request->data['files']['name'];
                if(move_uploaded_file($this->request->data['files']['tmp_name'], CATEGORIES.$filename)){
                    $thumbnail = $this->Custom->CreateNameThumb($this->request->data['files']['name']);
                    $this->Custom->generate_thumbnail(CATEGORIES.$filename, $thumbnail, SIZE180);
                    $this->request->data['thumbnails'] = 'thumbnails/'.$thumbnail;
                    $this->request->data['picture'] = 'categories/'.$filename;
                }
            }
            $category = $this->Categories->patchEntity($category, $this->request->data);
            
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        $this->set(compact('category', 'parentCategories'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            if (empty($this->request->data['parent_id'])) {
                $this->request->data['parent_id'] = 0;
            }
            if (!empty($this->request->data['files'.$id]['tmp_name'])) {
                $filename = rand(1,100000).'_'.$this->request->data['files'.$id]['name'];
                if(move_uploaded_file($this->request->data['files'.$id]['tmp_name'], CATEGORIES.$filename)){
                    $thumbnail = $this->Custom->CreateNameThumb($this->request->data['files'.$id]['name']);
                    $this->Custom->generate_thumbnail(CATEGORIES.$filename, $thumbnail, SIZE180);
                    $this->request->data['thumbnails'] = 'thumbnails/'.$thumbnail;
                    $this->request->data['picture'] = 'categories/'.$filename;
                }
            }
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
        $this->set(compact('category', 'parentCategories'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function SearchCategories(){
        if ($this->request->is('Ajax')) {
            $this->autoRender = false;
            $conditions = ['name LIKE "%'.$this->request->data['keyword'].'%"'];
            $categories = $this->Categories->find('threaded')->where($conditions);
            $parentCategories = $this->Categories->ParentCategories->find('list', ['limit' => 200]);
            $this->set(compact('categories','parentCategories'));
            $this->render('/Element/Categories/result_search');
        }
    }
}
