<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Passos Controller
 *
 * @property \App\Model\Table\PassosTable $Passos
 *
 * @method \App\Model\Entity\Passo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PassosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Modelos']
        ];
        $passos = $this->paginate($this->Passos);

        $this->set(compact('passos'));
    }

    /**
     * View method
     *
     * @param string|null $id Passo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $passo = $this->Passos->get($id, [
            'contain' => ['Modelos', 'Concluidos']
        ]);

        $this->set('passo', $passo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $passo = $this->Passos->newEntity();
        if ($this->request->is('post')) {
            $passo = $this->Passos->patchEntity($passo, $this->request->getData());
            if ($this->Passos->save($passo)) {
                $this->Flash->success(__('The passo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The passo could not be saved. Please, try again.'));
        }
        $modelos = $this->Passos->Modelos->find('list', ['limit' => 200]);
        $this->set(compact('passo', 'modelos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Passo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $passo = $this->Passos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $passo = $this->Passos->patchEntity($passo, $this->request->getData());
            if ($this->Passos->save($passo)) {
                $this->Flash->success(__('The passo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The passo could not be saved. Please, try again.'));
        }
        $modelos = $this->Passos->Modelos->find('list', ['limit' => 200]);
        $this->set(compact('passo', 'modelos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Passo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $passo = $this->Passos->get($id);
        if ($this->Passos->delete($passo)) {
            $this->Flash->success(__('The passo has been deleted.'));
        } else {
            $this->Flash->error(__('The passo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
