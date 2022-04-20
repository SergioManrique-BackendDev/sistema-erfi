<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Solicitudes Controller
 *
 * @property \App\Model\Table\SolicitudesTable $Solicitudes
 * @method \App\Model\Entity\Solicitude[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SolicitudesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pedidos'],
        ];
        $solicitudes = $this->paginate($this->Solicitudes, ['order' => [
            'id' => 'desc'
        ]]);

        $this->set(compact('solicitudes'));
    }

    /**
     * View method
     *
     * @param string|null $id Solicitude id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $solicitude = $this->Solicitudes->get($id, [
            'contain' => ['Pedidos'],
        ]);

        $this->set(compact('solicitude'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $params = $this->request->getAttribute('params');
        $pedidoId = $params['?']['pedido_id'];
        $solicitude = $this->Solicitudes->newEmptyEntity();
        if ($this->request->is('post')) {
            //find or create person
            $solicitude = $this->Solicitudes->patchEntity($solicitude, $this->request->getData());
            $personaName = $this->request->getData()['persona'];
            $personasTable = $this->getTableLocator()->get('Personas');
            $queryPersona = $personasTable->find()->where(['Nombre' => $personaName])->first();
            if($queryPersona){
                $solicitude['persona'] = $queryPersona['id'];
            } else {
                $newPersona = $personasTable->newEmptyEntity();
                $newPersona->nombre = $personaName;
                $newPersona->deuda = 0;
                $personasTable->save($newPersona);
            }
            //add cost to pedido
            $pedidosTable = $this->getTableLocator()->get('Pedidos');
            $queryPedido = $pedidosTable->find()->where(['id' => $pedidoId])->first();
            $queryPedido->costo_venta += $solicitude['precio'] * $solicitude['cantidad'];
            $pedidosTable->save($queryPedido);
            //save solicitud
            if ($this->Solicitudes->save($solicitude)) {
                $this->Flash->success(__('The solicitud has been saved.'));

                return $this->redirect(['controller' => 'pedidos', 'action' => 'view', $pedidoId]);
            }
            debug($solicitude->getErrors());

            $this->Flash->error(__('The solicitud could not be saved. Please, try again.'));
        }
        $pedidos = $this->Solicitudes->Pedidos->find('list', ['limit' => 200])->all();
        $this->set(compact('solicitude', 'pedidos', 'pedidoId'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Solicitude id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $solicitude = $this->Solicitudes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $solicitude = $this->Solicitudes->patchEntity($solicitude, $this->request->getData());
            if ($this->Solicitudes->save($solicitude)) {
                $this->Flash->success(__('The solicitude has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The solicitude could not be saved. Please, try again.'));
        }
        $pedidos = $this->Solicitudes->Pedidos->find('list', ['limit' => 200])->all();
        $this->set(compact('solicitude', 'pedidos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Solicitude id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $solicitude = $this->Solicitudes->get($id);
        //remove cost to pedido
        $pedidosTable = $this->getTableLocator()->get('Pedidos');
        $queryPedido = $pedidosTable->find()->where(['id' => $solicitude['pedido_id']])->first();
        $queryPedido->costo_venta -= $solicitude['precio'];
        $pedidosTable->save($queryPedido);
        if ($this->Solicitudes->delete($solicitude)) {
            $this->Flash->success(__('The solicitude has been deleted.'));
        } else {
            $this->Flash->error(__('The solicitude could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'pedidos', 'action' => 'view', $solicitude['pedido_id']]);
    }

    public function deliver($id = null)
    {
        return $this->redirect(['controller' => 'ventas', 'action' => 'add', '?' => ['solicitud_id' => $id]]);
    }
}
