<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * CompraMaterials Controller
 *
 * @property \App\Model\Table\CompraMaterialsTable $CompraMaterials
 *
 * @method \App\Model\Entity\CompraMaterial[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompraMaterialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Materials']
        ];
        $compraMaterials = $this->paginate($this->CompraMaterials);

        $this->set(compact('compraMaterials'));
    }

    /**
     * View method
     *
     * @param string|null $id Compra Material id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $compraMaterial = $this->CompraMaterials->get($id, [
            'contain' => ['Materials']
        ]);

        $this->set('compraMaterial', $compraMaterial);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null){
        $compraMaterial = $this->CompraMaterials->newEntity();
        if($id){
            $material = $this->CompraMaterials->Materials->get($id);
            $compraMaterial->material_id = $id;
            $compraMaterial->material = $material;
        }
        if ($this->request->is('post')) {
            $compraMaterial = $this->CompraMaterials->patchEntity($compraMaterial, $this->request->getData());
            if ($this->CompraMaterials->save($compraMaterial)) {
                $this->Flash->success(__('The compra material has been saved.'));

                return $this->redirect(['controller' => 'materials', 'action' => 'view', $compraMaterial->material_id]);
            }
            $this->Flash->error(__('The compra material could not be saved. Please, try again.'));
        }
        $materials = $this->CompraMaterials->Materials->find('list', ['limit' => 200]);
        $this->set(compact('compraMaterial', 'materials'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Compra Material id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $compraMaterial = $this->CompraMaterials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $compraMaterial = $this->CompraMaterials->patchEntity($compraMaterial, $this->request->getData());
            if ($this->CompraMaterials->save($compraMaterial)) {
                $this->Flash->success(__('The compra material has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The compra material could not be saved. Please, try again.'));
        }
        $materials = $this->CompraMaterials->Materials->find('list', ['limit' => 200]);
        $this->set(compact('compraMaterial', 'materials'));
    }

    public function chegou($id = null){
        $compraMaterial = $this->CompraMaterials->get($id, ['contain' => ['Materials']]);


        $agora = Time::now();
        $mudancas = [
            'data_chegada' => [
                'year' => $agora->year,
                'month' => $agora->month,
                'day' => $agora->day,
                'hour' => $agora->hour,
                'minute' => $agora->minute
            ],
            'material'=> ['saldo_atual' => ($compraMaterial->quantidade + $compraMaterial->material->saldo_atual)]
        ];
        //debug($compraMaterial);
        $compraMaterial = $this->CompraMaterials->patchEntity($compraMaterial, $mudancas);
        //debug($compraMaterial);
        if ($this->CompraMaterials->save($compraMaterial)) {
            $this->Flash->success(__('Chegou a compra!'));
            return $this->redirect(['controller' => 'materials','action' => 'view', $compraMaterial->material->id]);
        }
        $this->Flash->error(__('The compra material could not be saved. Please, try again.'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Compra Material id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $compraMaterial = $this->CompraMaterials->get($id);
        if ($this->CompraMaterials->delete($compraMaterial)) {
            $this->Flash->success(__('The compra material has been deleted.'));
        } else {
            $this->Flash->error(__('The compra material could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'materials', 'action' => 'view', $compraMaterial->material_id]);
    }
}
