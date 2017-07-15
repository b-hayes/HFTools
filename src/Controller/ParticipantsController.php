<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Participants Controller
 *
 * @property \App\Model\Table\ParticipantsTable $Participants
 *
 * @method \App\Model\Entity\Participant[] paginate($object = null, array $settings = [])
 */
class ParticipantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->requireAuthLevel( 'admin' );

        $participants = $this->paginate($this->Participants);

        $this->set(compact('participants'));
        $this->set('_serialize', ['participants']);
    }

    /**
     * View method
     *
     * @param string|null $id Participant id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->requireAuthLevel( 'admin' );

        $participant = $this->Participants->get($id, [
            'contain' => ['Clients', 'Roles', 'Sessions', 'Observations']
        ]);

        $this->set('participant', $participant);
        $this->set('_serialize', ['participant']);
    }

    public function modalAdd() {
        $participant = $this->Participants->newEntity();

        if ($this->request->is('post')) {

            $participant = $this->Participants->patchEntity($participant, $this->request->getData());
            $this->Participants->save($participant);
        }

        $clients = $this->Participants->Clients->find('list', ['limit' => 200]);
        $roles = $this->Participants->Roles->find('list', ['limit' => 200]);
        $sessions = $this->Participants->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('participant', 'clients', 'roles', 'sessions'));
        $this->set('_serialize', ['participant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $participant = $this->Participants->newEntity();

        if ($this->request->is('post')) {

            $participant = $this->Participants->patchEntity($participant, $this->request->getData());
            if ($this->Participants->save($participant)) {
                $this->Flash->success(__('The participant has been saved.'));

                //return $this->redirect($this->referer());
                return $this->redirect(['action' => 'index']);

            } else {
                $this->Flash->error(__('The participant could not be saved. Please, try again.'));
            }
        }

        $clients = $this->Participants->Clients->find('list', ['limit' => 200]);
        $roles = $this->Participants->Roles->find('list', ['limit' => 200]);
        $sessions = $this->Participants->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('participant', 'clients', 'roles', 'sessions'));
        $this->set('_serialize', ['participant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Participant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->requireAuthLevel( 'admin' );

        $participant = $this->Participants->get($id, [
            'contain' => ['Clients', 'Roles', 'Sessions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $participant = $this->Participants->patchEntity($participant, $this->request->getData());
            if ($this->Participants->save($participant)) {
                $this->Flash->success(__('The participant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The participant could not be saved. Please, try again.'));
        }
        $clients = $this->Participants->Clients->find('list', ['limit' => 200]);
        $roles = $this->Participants->Roles->find('list', ['limit' => 200]);
        $sessions = $this->Participants->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('participant', 'clients', 'roles', 'sessions'));
        $this->set('_serialize', ['participant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Participant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->requireAuthLevel( 'admin' );

        $this->request->allowMethod(['post', 'delete']);
        $participant = $this->Participants->get($id);
        if ($this->Participants->delete($participant)) {
            $this->Flash->success(__('The participant has been deleted.'));
        } else {
            $this->Flash->error(__('The participant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
