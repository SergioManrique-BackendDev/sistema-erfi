<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Resumenes Controller
 *
 * @property \App\Model\Table\ResumenesTable $Resumenes
 * @method \App\Model\Entity\Resumene[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ResumenesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $resumenes = $this->paginate($this->Resumenes, ['order' => [
            'id' => 'desc'
        ]]);
        $lastResumen = $resumenes->first();

        $this->set(compact('resumenes', 'lastResumen'));
    }

    /**
     * View method
     *
     * @param string|null $id Resumene id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resumene = $this->Resumenes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('resumene'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resumene = $this->Resumenes->newEmptyEntity();
        //set date
        $resumene->date = date("Y-m-d");
        //set gastos_productos
        $gastosTable = $this->getTableLocator()->get('Gastos');
        $gastoTotal = 0;
        $allGastos = $gastosTable->find('all');
        foreach($allGastos as $gasto){
            $gastoTotal += $gasto->cantidad;
        }
        $resumene->gastos_productos = $gastoTotal;
        //set ganancia_bruta
        $ventasTable = $this->getTableLocator()->get('Ventas');
        $ventaTotal = 0;
        $allVentas = $ventasTable->find('all');
        foreach($allVentas as $venta){
            $ventaTotal += $venta->cantidad;
        }
        $resumene->ganancia_bruta = $ventaTotal;
        //set deuda
        $personasTable = $this->getTableLocator()->get('Personas');
        $deudaTotal = 0;
        $allPersonas = $personasTable->find('all');
        foreach($allPersonas as $persona){
            $deudaTotal += $persona->deuda;
        }
        $resumene->deuda = $deudaTotal;
        //set producto
        $productosTable = $this->getTableLocator()->get('Productos');
        $productosTotal = 0;
        $allProductos = $productosTable->find('all');
        foreach($allProductos as $producto){
            if(!$producto->vendido){
                $productosTotal += $producto->costo_compra;
            }
        }
        $resumene->producto = $productosTotal;
        //set cantidad_bolsa
        $cantidadBolsa = ($gastoTotal * -1) + ($ventaTotal - $deudaTotal);
        $resumene->cantidad_bolsa = $cantidadBolsa;
        //set ganancia_final
        $gananciaFinal = $cantidadBolsa + $deudaTotal + $productosTotal;
        $resumene->ganancia_final = $gananciaFinal;
        //save everything
        $this->set(compact('resumene'));
        if ($this->Resumenes->save($resumene)) {
            $this->Flash->success(__('The resumene has been saved.'));
        } else {
            $this->Flash->error(__('The resumene could not be saved. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Resumene id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resumene = $this->Resumenes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resumene = $this->Resumenes->patchEntity($resumene, $this->request->getData());
            if ($this->Resumenes->save($resumene)) {
                $this->Flash->success(__('The resumene has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The resumene could not be saved. Please, try again.'));
        }
        $this->set(compact('resumene'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Resumene id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resumene = $this->Resumenes->get($id);
        if ($this->Resumenes->delete($resumene)) {
            $this->Flash->success(__('The resumene has been deleted.'));
        } else {
            $this->Flash->error(__('The resumene could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
