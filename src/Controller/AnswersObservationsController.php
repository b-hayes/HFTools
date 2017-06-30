<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AnswersObservations Controller
 *
 * @property \App\Model\Table\AnswersObservationsTable $AnswersObservations
 *
 * @method \App\Model\Entity\AnswersObservation[] paginate($object = null, array $settings = [])
 */
class AnswersObservationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Observations', 'Answers']
        ];
        $answersObservations = $this->paginate($this->AnswersObservations);

        $this->set(compact('answersObservations'));
        $this->set('_serialize', ['answersObservations']);
    }

    /**
     * View method
     *
     * @param string|null $id Answers Observation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $answersObservation = $this->AnswersObservations->get($id, [
            'contain' => ['Observations', 'Answers']
        ]);

        $this->set('answersObservation', $answersObservation);
        $this->set('_serialize', ['answersObservation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $answersObservation = $this->AnswersObservations->newEntity();
        if ($this->request->is('post')) {
            $answersObservation = $this->AnswersObservations->patchEntity($answersObservation, $this->request->getData());
            if ($this->AnswersObservations->save($answersObservation)) {
                $this->Flash->success(__('The answers observation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The answers observation could not be saved. Please, try again.'));
        }
        $observations = $this->AnswersObservations->Observations->find('list', ['limit' => 200]);
        $answers = $this->AnswersObservations->Answers->find('list', ['limit' => 200]);
        $this->set(compact('answersObservation', 'observations', 'answers'));
        $this->set('_serialize', ['answersObservation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Answers Observation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $answersObservation = $this->AnswersObservations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $answersObservation = $this->AnswersObservations->patchEntity($answersObservation, $this->request->getData());
            if ($this->AnswersObservations->save($answersObservation)) {
                $this->Flash->success(__('The answers observation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The answers observation could not be saved. Please, try again.'));
        }
        $observations = $this->AnswersObservations->Observations->find('list', ['limit' => 200]);
        $answers = $this->AnswersObservations->Answers->find('list', ['limit' => 200]);
        $this->set(compact('answersObservation', 'observations', 'answers'));
        $this->set('_serialize', ['answersObservation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Answers Observation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $answersObservation = $this->AnswersObservations->get($id);
        if ($this->AnswersObservations->delete($answersObservation)) {
            $this->Flash->success(__('The answers observation has been deleted.'));
        } else {
            $this->Flash->error(__('The answers observation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
