<?php
namespace App\Controller;

/**
 * Observations Controller
 *
 * @property \App\Model\Table\ObservationsTable $Observations
 */
class ObservationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Participants', 'Runs']
        ];
        $observations = $this->paginate($this->Observations);

        $this->set(compact('observations'));
        $this->set('_serialize', ['observations']);
    }

    /**
     * View method
     *
     * @param string|null $id Observation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $observation = $this->Observations->get($id, [
            'contain' => ['Participants', 'Runs', 'Results']
        ]);

        $this->set('observation', $observation);
        $this->set('_serialize', ['observation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $observation = $this->Observations->newEntity();
        if ($this->request->is('post')) {
            $observation = $this->Observations->patchEntity($observation, $this->request->data);
            if ($this->Observations->save($observation)) {
                $this->Flash->success(__('The observation has been saved.'));

                return $this->redirect($this->Auth->redirectUrl('/users/home'));
            }
            $this->Flash->error(__('The observation could not be saved. Please, try again.'));
        }
        $participants = $this->Observations->Participants->find('list', ['limit' => 200]);
        $runs = $this->Observations->Runs->find('list', ['limit' => 200]);
        $this->set(compact('observation', 'participants', 'runs'));
        $this->set('_serialize', ['observation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Observation id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $observation = $this->Observations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $observation = $this->Observations->patchEntity($observation, $this->request->data);
            if ($this->Observations->save($observation)) {
                $this->Flash->success(__('The observation has been saved.'));

                return $this->redirect($this->Auth->redirectUrl('/users/home'));
            }
            $this->Flash->error(__('The observation could not be saved. Please, try again.'));
        }
        $participants = $this->Observations->Participants->find('list', ['limit' => 200]);
        $runs = $this->Observations->Runs->find('list', ['limit' => 200]);
        $this->set(compact('observation', 'participants', 'runs'));
        $this->set('_serialize', ['observation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Observation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $observation = $this->Observations->get($id);
        if ($this->Observations->delete($observation)) {
            $this->Flash->success(__('The observation has been deleted.'));
        } else {
            $this->Flash->error(__('The observation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
