<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MaterialClientes Controller
 *
 * @property \App\Model\Table\MaterialClientesTable $MaterialClientes
 *
 * @method \App\Model\Entity\MaterialCliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MaterialClientesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes', 'Materials']
        ];
        $materialClientes = $this->paginate($this->MaterialClientes);

        $this->set(compact('materialClientes'));
    }

    /**
     * View method
     *
     * @param string|null $id Material Cliente id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materialCliente = $this->MaterialClientes->get($id, [
            'contain' => ['Clientes', 'Materials']
        ]);

        $this->set('materialCliente', $materialCliente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $materialCliente = $this->MaterialClientes->newEntity();
        if ($this->request->is('post')) {
            $materialCliente = $this->MaterialClientes->patchEntity($materialCliente, $this->request->getData());
            if ($this->MaterialClientes->save($materialCliente)) {
                $this->Flash->success(__('The material cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The material cliente could not be saved. Please, try again.'));
        }
        $clientes = $this->MaterialClientes->Clientes->find('list', ['limit' => 200]);
        $materials = $this->MaterialClientes->Materials->find('list', ['limit' => 200]);
        $this->set(compact('materialCliente', 'clientes', 'materials'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Material Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materialCliente = $this->MaterialClientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materialCliente = $this->MaterialClientes->patchEntity($materialCliente, $this->request->getData());
            if ($this->MaterialClientes->save($materialCliente)) {
                $this->Flash->success(__('The material cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The material cliente could not be saved. Please, try again.'));
        }
        $clientes = $this->MaterialClientes->Clientes->find('list', ['limit' => 200]);
        $materials = $this->MaterialClientes->Materials->find('list', ['limit' => 200]);
        $this->set(compact('materialCliente', 'clientes', 'materials'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Material Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materialCliente = $this->MaterialClientes->get($id);
        if ($this->MaterialClientes->delete($materialCliente)) {
            $this->Flash->success(__('The material cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The material cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
