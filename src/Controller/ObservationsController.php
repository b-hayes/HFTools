<?php
namespace App\Controller;
use function array_push;
use Cake\Datasource\ConnectionManager;

use App\Controller\AppController;
use function debug;
use function MongoDB\BSON\toJSON;
use function time;

/**
 * Observations Controller
 *
 * @property \App\Model\Table\ObservationsTable $Observations
 *
 * @method \App\Model\Entity\Observation[] paginate($object = null, array $settings = [])
 */
class ObservationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
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
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Participants');

        $results = ['questionnaire' => ['sections' => []]];

        $observation = $this->Observations->get($id, [
            'contain' => ['Participants', 'Runs', 'Answers' => ['Questions' => ['Sections' => ['Questionnaires']]]]
        ])->toArray();

        // get the questionnaire name and description
        $results['questionnaire']['name'] = $observation['answers'][0]['question']['section']['questionnaire']['name'];
        $results['questionnaire']['description'] = $observation['answers'][0]['question']['section']['questionnaire']['description'];

        // get the participant and observer names
        $observer = $this->Participants->find()->where(['id = :participantID'])
            ->bind(':participantID', $observation['observer_id'])->toArray();
        $results['participant']['name'] = $observation['participant']['first_name'] . ' ' . $observation['participant']['last_name'];
        $results['participant']['observer'] = $observer[0]['first_name'] . ' ' . $observer[0]['last_name'];

        // get the runs name and description
        $results['run']['name'] = $observation['run']['name'];
        $results['run']['description'] = $observation['run']['description'];
        $results['run']['run_date'] = $observation['run']['run_date']->nice();

        $lastAdded = '';

        foreach ($observation['answers'] as $observations) {
            if (strcmp($lastAdded, $observations['question']['section']['name']) != 0) {

                array_push($results['questionnaire']['sections'],
                    ['name' => $observations['question']['section']['name'],
                        'description' => $observations['question']['section']['description'],
                        'section_id' => $observations['question']['section']['id']]);
            }
            $lastAdded = $observations['question']['section']['name'];
        }

        foreach ($results['questionnaire']['sections'] as &$item) {
            $questions = [];

            foreach ($observation['answers'] as $observations) {

                if ($item['section_id'] == $observations['question']['section_id']) {
                    array_push($questions, [
                        'question_text' => $observations['question']['text'],
                        'answer_text' => $observations['answer_text']]);
                }
            }
            array_push($item, ['questions' => $questions]);
        }
            $this->set('results', $results);
            $this->set('_serialize', ['results']);
    }


    /**
     * View method
     *
     * @param string|null $id Observation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
//    public function view($id = null)
//    {
//        $observation = $this->Observations->get($id, [
//            'contain' => ['Participants', 'Runs', 'Answers']
//        ]);
//
//        $this->set('observation', $observation);
//        $this->set('_serialize', ['observation']);
//    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Questionnaires');
        $observation = $this->Observations->newEntity();

        if ($this->request->is('post')) {

            $observation = $this->Observations->patchEntity($observation, $this->request->getData());

            if ($this->Observations->save($observation)) {
                $this->Flash->success(__('The observation has been saved.'));
                if ($this->request->session()->read('Auth.User.role') == 'client') {
                    // set up the questionnaire answers and put participants into an array
                    return $this->redirect(['action' => 'index']);
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The observation could not be saved. Please, try again.'));
        }

        $questionnaires = $this->Questionnaires->find('list');
        $participants = $this->Observations->Participants->find('list', ['limit' => 200]);
        $runs = $this->Observations->Runs->find('list', ['limit' => 200]);
        $this->set(compact('observation', 'participants', 'runs', 'questionnaires'));
        $this->set('_serialize', ['observation']);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function create()
    {
        $this->loadModel('Questionnaires');
        $connection = ConnectionManager::get('default');
        $currentSessionID = $this->request->session()->read('Current.session.id');
        $userRole = $this->request->session()->read('Auth.User.role');

        $observation = $this->Observations->newEntity();

        if ($this->request->is('post')) {
            $hasSuccessfullySaved = true;

            $observer = $this->request->getData('observer_id');
            $run = $this->request->getData('run_id');
            $questionnaire_id = $this->request->getData('questionnaire_id');
            $participantsAdded = $this->request->getData('participant._id');

            $observationIds = [];

            foreach ($participantsAdded as $addParticipant) {
                $newObs = $this->Observations->newEntity();
                $newObs->participant_id = $addParticipant;
                $newObs->observer_id = $observer;
                $newObs->run_id = $run;

                if(!$this->Observations->save($newObs)) {
                    $hasSuccessfullySaved = false;
                }
                array_push($observationIds, $newObs);
            }

            if ($hasSuccessfullySaved) {
                $this->request->session()->write('Tmp', ['observations' => $observationIds]);

                $this->Flash->success(__('The observation has been saved.'));
                return $this->redirect(['controller' => 'answers','action' => 'questionnaireAnswers', $questionnaire_id]);
            }
            $this->Flash->error(__('The observation could not be saved. Please, try again.'));
        }

        // get all the participants stored in this session only
        $results = $connection->execute('SELECT participant_id FROM participants_sessions WHERE session_id = :id', ['id' => $currentSessionID])->fetchAll();

        // get all the participants ids and create an array display only those in observation view.
        $ids = [];
        for ($i = 0; $i < count($results); $i++) {
            array_push($ids, $results[$i][0]);
        }

        // List of all questionnaires they can choose from
        $questionnaires = $this->Questionnaires->find('list');

        // display different sets depending on if the person using the form is an admin or a client
        if ($userRole == 'client') {
            $participants = $this->Observations->Participants->find('list')->where(['id IN ' => $ids]);
            $runs = $this->Observations->Runs->find('list')->where(['session_id IN ' => $currentSessionID]);

        } else {
            $participants = $this->Observations->Participants->find('list', ['limit' => 200]);
            $runs = $this->Observations->Runs->find('list', ['limit' => 200]);
        }

        $this->set(compact('observation', 'participants', 'runs', 'questionnaires'));
        $this->set('_serialize', ['observation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Observation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $observation = $this->Observations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $observation = $this->Observations->patchEntity($observation, $this->request->getData());
            if ($this->Observations->save($observation)) {
                $this->Flash->success(__('The observation has been saved.'));

                return $this->redirect(['action' => 'index']);
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
     * @return \Cake\Http\Response|null Redirects to index.
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
