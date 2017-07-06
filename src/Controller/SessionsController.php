<?php
namespace App\Controller;

use App\Controller\AppController;

use function array_push;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Date;
use Cake\I18n\DateFormatTrait;
use function is_null;

/**
 * Sessions Controller
 *
 * @property \App\Model\Table\SessionsTable $Sessions
 *
 * @method \App\Model\Entity\Session[] paginate($object = null, array $settings = [])
 */
class SessionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients']
        ];
        $sessions = $this->paginate($this->Sessions);

        $this->set(compact('sessions'));
        $this->set('_serialize', ['sessions']);
    }

    /**
     * View method
     *
     * @param string|null $id Session id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => ['Clients', 'Participants', 'Runs']
        ]);

        $this->set('session', $session);
        $this->set('_serialize', ['session']);
    }

    public function displaySpecificParticipants($clientId = null) {

        //$client_id = $this->request->getData('id');

        if ($clientId != null) {
            $this->loadModel('Participants');

            // fuck ORM doing real queries to make up for bad database design.
            $connection = ConnectionManager::get('default');

            // had to do some hackery to get this working, but gets participant ids that share the same client as the currently logged in account
            $results = $connection->execute('SELECT participant_id FROM clients_participants WHERE client_id = :id', ['id' => $clientId])->fetchAll();

            if ($results) {

                // more awesome hackery work, used to out the array in the correct format for retrieving data from participants model
                $ids = [];
                for ($i = 0; $i < count($results); $i++) {
                    array_push($ids, $results[$i][0]);
                }

                $participants = $this->Participants->find('list')->where(['id IN ' => $ids]);

                $this->set(compact('participants'));
                $this->set('_serialize', ['participants']);
            }
        }

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Participants');
        $clients_id = $this->request->session()->read('Auth.User.client_id');
        $userRole = $this->request->session()->read('Auth.User.role');

        // fuck ORM doing real queries to make up for bad database design.
        $connection = ConnectionManager::get('default');
        $session = $this->Sessions->newEntity();

        if ($this->request->is('post')) {

            $session = $this->Sessions->patchEntity($session, $this->request->getData());
            $participantID = $this->request->getData('participant._id');

            $startDateTemp = $session->start_dates;
            $endDateTemp = $session->end_dates;

            $session->start_date = date('Y-m-d', strtotime($startDateTemp));
            $session->end_date = date('Y-m-d', strtotime($endDateTemp));

            // check the user selected one or more participants (otherwise app will crash if they do not.
            if (!empty($participantID)) {
                if ($this->Sessions->save($session)) {
                    for ($i = 0; $i < count($participantID); $i++) {
                        $connection->insert('participants_sessions', [
                            'participant_id' => $participantID[$i],
                            'session_id' => $session->id
                        ]);
                    }

                    $this->Flash->success(__('The session has been saved.'));

                    if (strcmp($userRole, 'client') == 0) {
                        return $this->redirect(['controller' => 'users', 'action' => 'home']);
                    }
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('The session could not be saved. Please, try again.'));
       }
        // had to do some hackery to get this working, but gets participant ids that share the same client as the currently logged in account
        $results = $connection->execute('SELECT participant_id FROM clients_participants WHERE client_id = :id', ['id' => $clients_id])->fetchAll();

        // more awesome hackery work, used to out the array in the correct format for retrieving data from participants model
        $ids = [];
        for ($i = 0; $i < count($results); $i++) {
            array_push($ids, $results[$i][0]);
        }

        if ($userRole == 'client') {
            $clients = $this->Sessions->Participants->Clients->find('list')->where(['id = ' => $clients_id]);
            $participants = $this->Participants->find('list')->where(['id IN ' => $ids]);

        } else {
            $clients = $this->Sessions->Participants->Clients->find('list');
            $participants = $this->Participants->find('list');
        }

        $this->set(compact('session', 'clients', 'participants'));
        $this->set('_serialize', ['session']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Session id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => ['Participants']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $session = $this->Sessions->patchEntity($session, $this->request->getData());

            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('The session has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The session could not be saved. Please, try again.'));
        }
        $clients = $this->Sessions->Clients->find('list', ['limit' => 200]);
        $participants = $this->Sessions->Participants->find('list', ['limit' => 200]);

        $this->set(compact('session', 'clients', 'participants'));
        $this->set('_serialize', ['session']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Session id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $session = $this->Sessions->get($id);
        if ($this->Sessions->delete($session)) {
            $this->Flash->success(__('The session has been deleted.'));
        } else {
            $this->Flash->error(__('The session could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
