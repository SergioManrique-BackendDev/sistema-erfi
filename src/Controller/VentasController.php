<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ventas Controller
 *
 * @property \App\Model\Table\VentasTable $Ventas
 * @method \App\Model\Entity\Venta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VentasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $ventas = $this->paginate($this->Ventas, ['contain' => ['Personas'], 'order' => ['id' => 'desc']]);        
        $this->set(compact('ventas'));
    }

    /**
     * View method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $venta = $this->Ventas->get($id, [
            'contain' => ['Personas'],
        ]);

        $this->set(compact('venta'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $venta = $this->Ventas->newEmptyEntity();
        if ($this->request->is('post')) {
            $venta = $this->Ventas->patchEntity($venta, $this->request->getData());
            $personaName = $this->request->getData()['persona'];
            $personasTable = $this->getTableLocator()->get('Personas');
            $queryPersona = $personasTable->find()->where(['Nombre' => $personaName])->first();
            if($queryPersona){
                $venta['persona'] = $queryPersona['id'];
                $queryPersona->deuda += $venta['cantidad'];
                $personasTable->save($queryPersona);
            } else {
                $newPersona = $personasTable->newEmptyEntity();
                $newPersona->nombre = $personaName;
                $newPersona->deuda = $venta['cantidad'];
                $personasTable->save($newPersona);
            }
            $venta['fecha'] = date("Y-m-d");
            //if solicitud is involved, work with that
            $params = $this->request->getAttribute('params');
            $usingSolicitud = false;
            if(isset($params['?'])){
                $solicitudId = $params['?']['solicitud_id'];
                $solicitudesTable = $this->getTableLocator()->get('Solicitudes');
                $querySolicitud = $solicitudesTable->find()->where(['id' => $solicitudId])->first();
                $querySolicitud->fecha_entrega = date("Y-m-d");
                if($solicitudesTable->save($querySolicitud)){
                    $usingSolicitud = true;
                };
            }
            if ($this->Ventas->save($venta)) {
                $this->Flash->success(__('The venta has been saved.'));
                if($usingSolicitud){
                    return $this->redirect(['controller' => 'pedidos', 'action' => 'view', $querySolicitud->pedido_id]);
                } else {
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('The venta could not be saved. Please, try again.'));
        }
        //get data from solicitud if it exists
        $params = $this->request->getAttribute('params');
        if(isset($params['?'])){
            $solicitudId = $params['?']['solicitud_id'];
            $solicitudesTable = $this->getTableLocator()->get('Solicitudes');
            $querySolicitud = $solicitudesTable->find()->where(['id' => $solicitudId])->first();
            $querySolicitud = $solicitudesTable->loadInto($querySolicitud, ['Personas']);
            if($querySolicitud){
                $querySolicitud->total = $querySolicitud->precio * $querySolicitud->cantidad;
            } else {
                $this->Flash->error(__('The solicitud doesn\'t exist. Please, try again.'));
            }
        } else {
            $querySolicitud = null;
        }
        $this->set(compact('venta', 'querySolicitud'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $venta = $this->Ventas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venta = $this->Ventas->patchEntity($venta, $this->request->getData());
            if ($this->Ventas->save($venta)) {
                $this->Flash->success(__('The venta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The venta could not be saved. Please, try again.'));
        }
        $this->set(compact('venta'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Venta id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $venta = $this->Ventas->get($id);
        $personasTable = $this->getTableLocator()->get('Personas');
        $personaVenta = $personasTable->get($venta['persona']);
        $personaVenta['deuda'] -= $venta['cantidad'];
        $personasTable->save($personaVenta);
        if ($this->Ventas->delete($venta)) {
            $this->Flash->success(__('The venta has been deleted.'));
        } else {
            $this->Flash->error(__('The venta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
