<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 *
 * @method \App\Model\Entity\Bookmark[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookmarksController extends AppController
{
    public function isAuthorized($user)
    {
        if (isset($user['role']) and $user['role'] === 'user') {
            if (in_array($this->request->action, ['index', 'add'])) {
                return true;
            }

            if (in_array($this->request->action, ['edit', 'delete'])) {
                $id = $this->request->params['pass'][0];
                $bookmark = $this->Bookmarks->get($id);

                if ($bookmark->user_id == $user['id']) {
                    return true;
                }
            }
        }
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => ['user_id' => $this->Auth->user('id')],
            'order' => ['id' => 'desc']
        ];
        $bookmarks = $this->paginate($this->Bookmarks);

        $this->set(compact('bookmarks'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->is('post')) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            $bookmark->user_id = $this->Auth->user('id');

            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('El enlace ha sido creado correctamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El enlace no se ha podido crear correctamente. Por favor, inténtelo de nuevo.'));
        }
        $this->set(compact('bookmark'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookmark = $this->Bookmarks->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            $bookmark->user_id = $this->Auth->user('id');

            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('El enlace ha sido actualizado correctamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El enlace no ha podido ser eliminado. Por favor, inténtelo de nuevo.'));
        }
        $this->set(compact('bookmark'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);

        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success(__('El enlace ha sido eliminado correctamente.'));
        } else {
            $this->Flash->error(__('El enlace no ha podido ser eliminado. Por favor, inténtelo de nuevo'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
