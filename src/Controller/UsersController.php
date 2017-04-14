<?php
namespace App\Controller;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 */
class UsersController extends AppController
{

    /***
     * This is the landing page once a user logs in.
     */
    public function home()
    {
        $this->loadModel('Sessions');
        $this->loadModel('Days');
        $this->loadModel('Runs');

        $client_id = $this->Auth->user('client_id');
        $current_session = null;

        if ($client_id != null) {
            $current_session = $this->Sessions->find()
                ->where(['client_id' => $client_id])
                ->andwhere(['start_date <=' => date('Y-m-d')])
                ->andwhere(['end_date >=' => date('Y-m-d')])->first();
        }

        $current_day = null;

        if ($current_session != null) {
            $current_day = $this->Days->find()
                ->where(['session_id =' . $current_session['id']])
                ->andwhere(['DATE(day_date) =' => date('Y-m-d')])->first();
        }

        $current_run = null;

        if ($current_day != null) {

            $current_run = $this->Runs->find()
                ->where(['day_id = ' => $current_day['id']])
                ->andwhere(['is_open = ' => true])->first();
        }

        $this->request->session()->write('Current', ['session' => $current_session,
            'day' => $current_day, 'run' => $current_run]);


        if ($current_session) {
            if ($current_day) {
                if ($current_run) {
                    return $this->redirect(
                        ['controller' => 'observations', 'action' => 'add']);
                } else {
                    return $this->redirect(
                        ['controller' => 'runs', 'action' => 'add']);
                }
            } else {
                return $this->redirect(
                    ['controller' => 'days', 'action' => 'add']);
            }
        } else {
            return $this->redirect(
                ['controller' => 'sessions', 'action' => 'add']);
        }
    }





    /**
     * Allow users to login before gaining access to the site.
     *
     * @return \Cake\Network\Response|null
     */
    public function login()
    {
        // check if the user is already logged in
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl('/users/home'));
        }

        // for singing in check it is a post request
        if ($this->request->is('post')) {
            // check the user exists and they entered the correct password.
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl('/users/home'));
            }

            $this->Flash->error(__('Invalid username or password, try again'));
        }


    }

    /**
     * logs users out, updates last_login field and destroys the session
     *
     * @return \Cake\Network\Response|null
     */
    public function logout()
    {
        // check this works, but removed it from in here
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        $this->Users->patchEntity($user, ['last_login' => date('Y-m-d H:i:s')]);
        $this->Users->save($user);
        $this->setNavigation();

        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Clients']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $clients = $this->Users->Clients->find('list', ['limit' => 200]);
        $this->set(compact('user', 'clients'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $clients = $this->Users->Clients->find('list', ['limit' => 200]);
        $this->set(compact('user', 'clients'));
        $this->set('_serialize', ['user']);

    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
