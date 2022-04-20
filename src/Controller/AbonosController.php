<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Abonos Controller
 *
 * @property \App\Model\Table\AbonosTable $Abonos
 * @method \App\Model\Entity\Abono[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AbonosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $abonos = $this->paginate($this->Abonos, ['contain' => ['Personas'], 'order' => ['id' => 'desc']]);
        $this->set(compact('abonos'));
    }

    /**
     * View method
     *
     * @param string|null $id Abono id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $abono = $this->Abonos->get($id, [
            'contain' => ['Personas'],
        ]);

        $this->set(compact('abono'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $abono = $this->Abonos->newEmptyEntity();
        if ($this->request->is('post')) {
            $abono = $this->Abonos->patchEntity($abono, $this->request->getData());
            $personaName = $this->request->getData()['persona'];
            $personasTable = $this->getTableLocator()->get('Personas');
            $queryPersona = $personasTable->find()->where(['Nombre' => $personaName])->first();
            if($queryPersona){
                $abono['persona'] = $queryPersona['id'];
                $queryPersona->deuda -= $abono['cantidad'];
                $personasTable->save($queryPersona);
                $abono['fecha'] = date("Y-m-d");
                if ($this->Abonos->save($abono)) {
                    $this->Flash->success(__('The abono has been saved.'));
    
                    return $this->redirect(['action' => 'index']);
                }
            } 
            $this->Flash->error(__('The abono could not be saved. Please, try again.'));
        }
        $this->set(compact('abono'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Abono id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $abono = $this->Abonos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $abono = $this->Abonos->patchEntity($abono, $this->request->getData());
            if ($this->Abonos->save($abono)) {
                $this->Flash->success(__('The abono has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The abono could not be saved. Please, try again.'));
        }
        $this->set(compact('abono'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Abono id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $abono = $this->Abonos->get($id);
        $personasTable = $this->getTableLocator()->get('Personas');
        $personaAbono = $personasTable->get($abono['persona']);
        $personaAbono['deuda'] += $abono['cantidad'];
        $personasTable->save($personaAbono);
        if ($this->Abonos->delete($abono)) {
            $this->Flash->success(__('The abono has been deleted.'));
        } else {
            $this->Flash->error(__('The abono could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
