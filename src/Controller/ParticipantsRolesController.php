<?php
namespace App\Controller;

/**
 * ParticipantsRoles Controller
 *
 * @property \App\Model\Table\ParticipantsRolesTable $ParticipantsRoles
 */
class ParticipantsRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Participants', 'Roles']
        ];
        $participantsRoles = $this->paginate($this->ParticipantsRoles);

        $this->set(compact('participantsRoles'));
        $this->set('_serialize', ['participantsRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id Participants Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $participantsRole = $this->ParticipantsRoles->get($id, [
            'contain' => ['Participants', 'Roles']
        ]);

        $this->set('participantsRole', $participantsRole);
        $this->set('_serialize', ['participantsRole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $participantsRole = $this->ParticipantsRoles->newEntity();
        if ($this->request->is('post')) {
            $participantsRole = $this->ParticipantsRoles->patchEntity($participantsRole, $this->request->data);
            if ($this->ParticipantsRoles->save($participantsRole)) {
                $this->Flash->success(__('The participants role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The participants role could not be saved. Please, try again.'));
        }
        $participants = $this->ParticipantsRoles->Participants->find('list', ['limit' => 200]);
        $roles = $this->ParticipantsRoles->Roles->find('list', ['limit' => 200]);
        $this->set(compact('participantsRole', 'participants', 'roles'));
        $this->set('_serialize', ['participantsRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Participants Role id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $participantsRole = $this->ParticipantsRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $participantsRole = $this->ParticipantsRoles->patchEntity($participantsRole, $this->request->data);
            if ($this->ParticipantsRoles->save($participantsRole)) {
                $this->Flash->success(__('The participants role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The participants role could not be saved. Please, try again.'));
        }
        $participants = $this->ParticipantsRoles->Participants->find('list', ['limit' => 200]);
        $roles = $this->ParticipantsRoles->Roles->find('list', ['limit' => 200]);
        $this->set(compact('participantsRole', 'participants', 'roles'));
        $this->set('_serialize', ['participantsRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Participants Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $participantsRole = $this->ParticipantsRoles->get($id);
        if ($this->ParticipantsRoles->delete($participantsRole)) {
            $this->Flash->success(__('The participants role has been deleted.'));
        } else {
            $this->Flash->error(__('The participants role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
