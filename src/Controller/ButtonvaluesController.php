<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Buttonvalues Controller
 *
 * @property \App\Model\Table\ButtonvaluesTable $Buttonvalues
 *
 * @method \App\Model\Entity\Buttonvalue[] paginate($object = null, array $settings = [])
 */
class ButtonvaluesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $buttonvalues = $this->paginate($this->Buttonvalues);

        $this->set(compact('buttonvalues'));
        $this->set('_serialize', ['buttonvalues']);
    }

    /**
     * View method
     *
     * @param string|null $id Buttonvalue id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $buttonvalue = $this->Buttonvalues->get($id, [
            'contain' => ['Buttontypes']
        ]);

        $this->set('buttonvalue', $buttonvalue);
        $this->set('_serialize', ['buttonvalue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $buttonvalue = $this->Buttonvalues->newEntity();
        if ($this->request->is('post')) {
            $buttonvalue = $this->Buttonvalues->patchEntity($buttonvalue, $this->request->getData());
            if ($this->Buttonvalues->save($buttonvalue)) {
                $this->Flash->success(__('The buttonvalue has been saved.'));

                return $this->redirect($this->referer());
                //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The buttonvalue could not be saved. Please, try again.'));
        }
        $buttontypes = $this->Buttonvalues->Buttontypes->find('list', ['limit' => 200]);
        $this->set(compact('buttonvalue', 'buttontypes'));
        $this->set('_serialize', ['buttonvalue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Buttonvalue id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $buttonvalue = $this->Buttonvalues->get($id, [
            'contain' => ['Buttontypes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $buttonvalue = $this->Buttonvalues->patchEntity($buttonvalue, $this->request->getData());
            if ($this->Buttonvalues->save($buttonvalue)) {
                $this->Flash->success(__('The buttonvalue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The buttonvalue could not be saved. Please, try again.'));
        }
        $buttontypes = $this->Buttonvalues->Buttontypes->find('list', ['limit' => 200]);
        $this->set(compact('buttonvalue', 'buttontypes'));
        $this->set('_serialize', ['buttonvalue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Buttonvalue id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $buttonvalue = $this->Buttonvalues->get($id);
        if ($this->Buttonvalues->delete($buttonvalue)) {
            $this->Flash->success(__('The buttonvalue has been deleted.'));
        } else {
            $this->Flash->error(__('The buttonvalue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
