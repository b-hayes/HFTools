<?php
namespace App\Controller;

/**
 * ClientsParticipants Controller
 *
 * @property \App\Model\Table\ClientsParticipantsTable $ClientsParticipants
 */
class ClientsParticipantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Participants']
        ];
        $clientsParticipants = $this->paginate($this->ClientsParticipants);

        $this->set(compact('clientsParticipants'));
        $this->set('_serialize', ['clientsParticipants']);
    }

    /**
     * View method
     *
     * @param string|null $id Clients Participant id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clientsParticipant = $this->ClientsParticipants->get($id, [
            'contain' => ['Clients', 'Participants']
        ]);

        $this->set('clientsParticipant', $clientsParticipant);
        $this->set('_serialize', ['clientsParticipant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clientsParticipant = $this->ClientsParticipants->newEntity();
        if ($this->request->is('post')) {
            $clientsParticipant = $this->ClientsParticipants->patchEntity($clientsParticipant, $this->request->data);
            if ($this->ClientsParticipants->save($clientsParticipant)) {
                $this->Flash->success(__('The clients participant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clients participant could not be saved. Please, try again.'));
        }
        $clients = $this->ClientsParticipants->Clients->find('list', ['limit' => 200]);
        $participants = $this->ClientsParticipants->Participants->find('list', ['limit' => 200]);
        $this->set(compact('clientsParticipant', 'clients', 'participants'));
        $this->set('_serialize', ['clientsParticipant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Clients Participant id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clientsParticipant = $this->ClientsParticipants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clientsParticipant = $this->ClientsParticipants->patchEntity($clientsParticipant, $this->request->data);
            if ($this->ClientsParticipants->save($clientsParticipant)) {
                $this->Flash->success(__('The clients participant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clients participant could not be saved. Please, try again.'));
        }
        $clients = $this->ClientsParticipants->Clients->find('list', ['limit' => 200]);
        $participants = $this->ClientsParticipants->Participants->find('list', ['limit' => 200]);
        $this->set(compact('clientsParticipant', 'clients', 'participants'));
        $this->set('_serialize', ['clientsParticipant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clients Participant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clientsParticipant = $this->ClientsParticipants->get($id);
        if ($this->ClientsParticipants->delete($clientsParticipant)) {
            $this->Flash->success(__('The clients participant has been deleted.'));
        } else {
            $this->Flash->error(__('The clients participant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
