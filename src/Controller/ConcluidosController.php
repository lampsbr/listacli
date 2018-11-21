<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Concluidos Controller
 *
 * @property \App\Model\Table\ConcluidosTable $Concluidos
 *
 * @method \App\Model\Entity\Concluido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConcluidosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projetos', 'Passos']
        ];
        $concluidos = $this->paginate($this->Concluidos);

        $this->set(compact('concluidos'));
    }

    /**
     * View method
     *
     * @param string|null $id Concluido id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $concluido = $this->Concluidos->get($id, [
            'contain' => ['Projetos', 'Passos']
        ]);

        $this->set('concluido', $concluido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $concluido = $this->Concluidos->newEntity();
        if ($this->request->is('post')) {
            $concluido = $this->Concluidos->patchEntity($concluido, $this->request->getData());
            if ($this->Concluidos->save($concluido)) {
                $this->Flash->success(__('The concluido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The concluido could not be saved. Please, try again.'));
        }
        $projetos = $this->Concluidos->Projetos->find('list', ['limit' => 200]);
        $passos = $this->Concluidos->Passos->find('list', ['limit' => 200]);
        $this->set(compact('concluido', 'projetos', 'passos'));
    }

    public function concluir(){
        $projetoId = isset($this->request->query['projeto']) ? $this->request->query['projeto']:null;
        $passoId = isset($this->request->query['passo']) ? $this->request->query['passo']:null;
        $concluido = $this->Concluidos->newEntity();
        $concluido->projeto_id = $projetoId;
        $concluido->passo_id = $passoId;
        $concluido->data = Time::now();
        if ($this->Concluidos->save($concluido)) {
            $this->Flash->success(__('O passo foi concluído.'));
        } else{
            $this->Flash->error(__('Erro ao concluir passo.'));
        }
        return $this->redirect(['controller' => 'projetos','action' => 'view',$projetoId]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Concluido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $concluido = $this->Concluidos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $concluido = $this->Concluidos->patchEntity($concluido, $this->request->getData());
            if ($this->Concluidos->save($concluido)) {
                $this->Flash->success(__('The concluido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The concluido could not be saved. Please, try again.'));
        }
        $projetos = $this->Concluidos->Projetos->find('list', ['limit' => 200]);
        $passos = $this->Concluidos->Passos->find('list', ['limit' => 200]);
        $this->set(compact('concluido', 'projetos', 'passos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Concluido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $concluido = $this->Concluidos->get($id);
        if ($this->Concluidos->delete($concluido)) {
            $this->Flash->success(__('The concluido has been deleted.'));
        } else {
            $this->Flash->error(__('The concluido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
