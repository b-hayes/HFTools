<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Runs Controller
 *
 * @property \App\Model\Table\RunsTable $Runs
 *
 * @method \App\Model\Entity\Run[] paginate($object = null, array $settings = [])
 */
class RunsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sessions']
        ];
        $runs = $this->paginate($this->Runs);

        $this->set(compact('runs'));
        $this->set('_serialize', ['runs']);
    }

    /**
     * View method
     *
     * @param string|null $id Run id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //$this->requireAuthLevel( 'admin' );

        $this->loadModel('Participants');

        $run = $this->Runs->get($id, [
            'contain' => ['Sessions', 'Observations' => ['Participants', 'Answers']]
        ]);

        foreach ($run->observations as &$obs) {
            $obs->observer = $this->Participants->get($obs->observer_id);
        }

        $this->set('run', $run);
        $this->set('_serialize', ['run']);
    }



    public function allSessionRuns()
    {
        $this->loadModel('Participants');

        // get all run ids for today todo will need to be for specific run later.
        $id = $this->Runs->find('all')
            ->where(['run_date = :today'])
            ->bind(':today', date('Y-m-d'))->toArray();

        $run = $this->Runs->get($id[0]['id'], [
            'contain' => ['Sessions', 'Observations']
        ]);

        foreach ($run->observations as $observation) {
            $observation->observer_id;
        }

        $observers = 0;
        $participants = 0;

        $this->set('run', $run);
        $this->set('_serialize', ['run']);
    }


    public function modalAdd()
    {
        $clientId = $this->request->session()->read('Auth.User.client_id');
        $clientRole = $this->request->session()->read('Auth.User.role');

        $run = $this->Runs->newEntity();
        if ($this->request->is('post')) {
            $run = $this->Runs->patchEntity($run, $this->request->getData());

            $run->run_date = date('Y-m-d');
            $this->Runs->save($run);
        }

        if($clientRole == 'client') {
            $sessions = $this->Runs->Sessions->find('list')
                ->where(['client_id =' => $clientId])
                ->andwhere([':todays_date BETWEEN start_date AND end_date'])
                ->bind(':todays_date', date('Y-m-d'));
        } else {
            $sessions = $this->Runs->Sessions->find('list', ['limit' => 200]);
        }

        $this->set(compact('run', 'sessions'));
        $this->set('_serialize', ['run']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clientId = $this->request->session()->read('Auth.User.client_id');
        $clientRole = $this->request->session()->read('Auth.User.role');

        $run = $this->Runs->newEntity();
        if ($this->request->is('post')) {
            $run = $this->Runs->patchEntity($run, $this->request->getData());

            $run->run_date = date('Y-m-d');

            if ($this->Runs->save($run)) {
                $this->Flash->success(__('The run has been saved.'));

                if (strcmp($clientRole,'client') == 0) {
                    return $this->redirect(
                        ['controller' => 'users', 'action' => 'home']);
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The run could not be saved. Please, try again.'));
        }

        if($clientRole == 'client') {

            $sessions = $this->Runs->Sessions->find('list')
                ->where(['client_id =' => $clientId])
                ->andwhere([':todays_date BETWEEN start_date AND end_date'])
                ->bind(':todays_date', date('Y-m-d'));

        } else {
            $sessions = $this->Runs->Sessions->find('list', ['limit' => 200]);
        }

        $this->set(compact('run', 'sessions'));
        $this->set('_serialize', ['run']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Run id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->requireAuthLevel( 'admin' );

        $run = $this->Runs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $run = $this->Runs->patchEntity($run, $this->request->getData());
            if ($this->Runs->save($run)) {
                $this->Flash->success(__('The run has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The run could not be saved. Please, try again.'));
        }
        $sessions = $this->Runs->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('run', 'sessions'));
        $this->set('_serialize', ['run']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Run id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->requireAuthLevel( 'admin' );

        $this->request->allowMethod(['post', 'delete']);
        $run = $this->Runs->get($id);
        if ($this->Runs->delete($run)) {
            $this->Flash->success(__('The run has been deleted.'));
        } else {
            $this->Flash->error(__('The run could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
