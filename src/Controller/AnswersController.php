<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use function array_values;
use function debug;

/**
 * Answers Controller
 *
 * @property \App\Model\Table\AnswersTable $Answers
 *
 * @method \App\Model\Entity\Answer[] paginate($object = null, array $settings = [])
 */
class AnswersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Questions']
        ];
        $answers = $this->paginate($this->Answers);

        $this->set(compact('answers'));
        $this->set('_serialize', ['answers']);
    }

    /**
     * View method
     *
     * @param string|null $id Answer id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $answer = $this->Answers->get($id, [
            'contain' => ['Questions', 'Observations']
        ]);

        $this->set('answer', $answer);
        $this->set('_serialize', ['answer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $answer = $this->Answers->newEntity();
        if ($this->request->is('post')) {
            $answer = $this->Answers->patchEntity($answer, $this->request->getData());
            if ($this->Answers->save($answer)) {
                $this->Flash->success(__('The answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The answer could not be saved. Please, try again.'));
        }
        $questions = $this->Answers->Questions->find('list', ['limit' => 200]);
        $observations = $this->Answers->Observations->find('list', ['limit' => 200]);
        $this->set(compact('answer', 'questions', 'observations'));
        $this->set('_serialize', ['answer']);
    }

    /**
     * questionnaireAnswers method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function questionnaireAnswers($questionnaireID = null)
    {
        $this->loadModel('Questionnaires');
        $this->loadModel('Participants');
        $this->loadModel('AnswersObservations');

        $connection = ConnectionManager::get('default');

        $saved_successfully = true;
        $observationsArray = $this->request->session()->read('Tmp.observations');
        $count = (count($observationsArray) - 1);

        // terminating case here
        if (empty($observationsArray)) {
            $runID = $this->request->session()->read('Current.run.id');
            if ($runID) {
                return $this->redirect(['controller' => 'runs', 'action' => 'view', $runID]);
            }
        }

        if(empty($observationsArray[0]['participant_id'])) {
            return $this->redirect(['controller' => 'observations', 'action' => 'index']);
        }


        $observer = $this->Participants->get($observationsArray[0]['observer_id']);
        $participant = $this->Participants->get($observationsArray[0]['participant_id']);


        if ($this->request->is('post')) {

            $answers = $this->request->getData('answers');

            foreach ($answers as $answerSome) {
                $newAnswer = $this->Answers->newEntity();
                $newAnswer->question_id = (int)$answerSome['question_id'];
                $newAnswer->answer_text = $answerSome['answer_text'];

                if(!$this->Answers->save($newAnswer)) {
                    $saved_successfully = false;
                    debug("failed to save answer");
                }


                $connection->insert('answers_observations', [
                    'observation_id' => $observationsArray[0]['id'],
                    'answer_id' => $newAnswer->id
                ]);

            }

            if ($saved_successfully) {


                // insert into answers_observations
                $this->Flash->success(__('The answer has been saved.'));
                unset($observationsArray[0]);
                $observationsArray = array_values($observationsArray);
                $this->request->session()->write('Tmp', ['observations' => $observationsArray]);
                return $this->redirect(['controller' => 'answers', 'action' => 'questionnaireAnswers', $questionnaireID]);
            } else {
                $this->Flash->error(__('The answer could not be saved. Please, try again.'));
            }

        }

        $questionnaire = $this->Questionnaires->get($questionnaireID, [
            'contain' => ['Sections' => ['Questions', 'Buttontypes' => ['Buttonvalues']]]]);

        $this->set(compact('questionnaire', 'observer', 'participant', 'count'));
        $this->set('_serialize', ['questionnaire']);
    }


    /**
     * Edit method
     *
     * @param string|null $id Answer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $answer = $this->Answers->get($id, [
            'contain' => ['Observations']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $answer = $this->Answers->patchEntity($answer, $this->request->getData());
            if ($this->Answers->save($answer)) {
                $this->Flash->success(__('The answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The answer could not be saved. Please, try again.'));
        }
        $questions = $this->Answers->Questions->find('list', ['limit' => 200]);
        $observations = $this->Answers->Observations->find('list', ['limit' => 200]);
        $this->set(compact('answer', 'questions', 'observations'));
        $this->set('_serialize', ['answer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Answer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $answer = $this->Answers->get($id);
        if ($this->Answers->delete($answer)) {
            $this->Flash->success(__('The answer has been deleted.'));
        } else {
            $this->Flash->error(__('The answer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
