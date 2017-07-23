<?php
namespace App\Controller;

use const null;

/**
 * Questionnaires Controller
 *
 * @property \App\Model\Table\QuestionnairesTable $Questionnaires
 * @property \App\Model\Table\QuestionsTable $Questions
 * @method \App\Model\Entity\Questionnaire[] paginate($object = null, array $settings = [])
 */
class QuestionnairesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->requireAuthLevel( 'admin' );

        $questionnaires = $this->paginate($this->Questionnaires);

        $this->set(compact('questionnaires'));
        $this->set('_serialize', ['questionnaires']);
    }

    /**
     * View method
     *
     * @param string|null $id Questionnaire id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->requireAuthLevel( 'admin' );

        $questionnaire = $this->Questionnaires->get($id, [
            'contain' => ['Sections']
        ]);

        $this->set('questionnaire', $questionnaire);
        $this->set('_serialize', ['questionnaire']);
    }

    public function viewRelated($id = null)
    {
        $questionnaire = $this->Questionnaires->get($id, [
            'contain' => ['Sections' => ['Questions']]
        ]);

        $this->set('questionnaire', $questionnaire);
        $this->set('_serialize', ['questionnaire']);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->requireAuthLevel( 'admin' );

        $questionnaire = $this->Questionnaires->newEntity();
        if ($this->request->is('post')) {
            $questionnaire = $this->Questionnaires->patchEntity($questionnaire, $this->request->getData());
            if ($this->Questionnaires->save($questionnaire)) {
                $this->Flash->success(__('The questionnaire has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The questionnaire could not be saved. Please, try again.'));
        }
        $this->set(compact('questionnaire'));
        $this->set('_serialize', ['questionnaire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Questionnaire id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->requireAuthLevel( 'admin' );

        $questionnaire = $this->Questionnaires->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $questionnaire = $this->Questionnaires->patchEntity($questionnaire, $this->request->getData());
            if ($this->Questionnaires->save($questionnaire)) {
                $this->Flash->success(__('The questionnaire has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The questionnaire could not be saved. Please, try again.'));
        }
        $this->set(compact('questionnaire'));
        $this->set('_serialize', ['questionnaire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Questionnaire id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->requireAuthLevel( 'admin' );

        $this->request->allowMethod(['post', 'delete']);
        $questionnaire = $this->Questionnaires->get($id);
        if ($this->Questionnaires->delete($questionnaire)) {
            $this->Flash->success(__('The questionnaire has been deleted.'));
        } else {
            $this->Flash->error(__('The questionnaire could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function create()
    {
        $this->requireAuthLevel( 'admin' );
        $this->loadModel('Buttontypes');

        if ($this->request->is('post')) {

            /* There are lots of conditions to check for:
                    1. sections must be > 0
                    2. questions for each section must be > 0
                    2. questions can not be empty
            Rather than lots of nested if conditions to $hasProvidedRelevantInformation is used to flag an error
            before in order to abort the save operation. */
            $hasProvidedRelevantInformation = true;
            // This was used partly to debug, but also to let the user know what they did wrong.
            $errorMessageInFlash = 'The questionnaire could not be saved. Please, try again.';
            /* This creates a new questionnaire ORM object then the second line builds its structure linking everything
                in the 'associated' parts to our object. This allows as to populate multiple tables in one go. */
            $questionnaire = $this->Questionnaires->newEntity();
            $questionnaire = $this->Questionnaires->patchEntity($questionnaire, $this->request->getData(), [
                    'associated' => [
                        'Sections' => ['associated' => ['Questions']]
                    ]]
            );
            /* Because of how the create.ctp works, the array index may have missing values if a user deletes
                a question or section that is situated between two others. I.E. the array coming in might look like
                this:
                    'sections' => [
                        '2' => 'blah',
                        '4' => 'blah again',
                        '5' => 'and so on'
                     [
            however, this would cause an issue with our code, so use $this->reindexArray to
            */
            $dataSection = $this->reindexArray($this->request->getData('section'));
            // All the Items on the form are contained into a variable
            $sections = $this->Questionnaires->Sections->newEntities($dataSection);

            if (!empty($sections)) {
                $sectionsArray = [];
                foreach ($sections as $section) {
                    $questionsArray = [];
                    if (empty($section->name)) {
                        $hasProvidedRelevantInformation = false;
                        $errorMessageInFlash = 'You need to provide each section with a name';
                        break;
                    }
                    $newSec = $this->Questionnaires->Sections->newEntity();
                    $newSec->name = $section->name;
                    $newSec->description = $section->description;


                    $newSec->buttontype_id = $section->buttontype_id;
                    if (empty($section->question)) {
                        $hasProvidedRelevantInformation = false;
                        $errorMessageInFlash = 'You need to have at least one question for each section!';
                        break;
                    }
                    $dataQuestions = $this->reindexArray($section->question);
                    $questions = $this->Questionnaires->Sections->Questions->newEntities($dataQuestions);
                    foreach ($questions as $question) {
                        if(empty($question)) {
                            $hasProvidedRelevantInformation = false;
                            $errorMessageInFlash = 'All questions must have text!';
                            break;
                        }
                        $newQuestion = $this->Questionnaires->Sections->Questions->newEntity();
                        $newQuestion->text = $question['text'];
                        array_push($questionsArray, $newQuestion);
                    }
                    // Set the questions for this section to..
                    $newSec->questions = $questionsArray;
                    array_push($sectionsArray, $newSec);
                }
                // Set the checklist's items to be the array
                $questionnaire->sections = $sectionsArray;
                if ($hasProvidedRelevantInformation) {
                    if($this->Questionnaires->save($questionnaire)){
                        $this->Flash->success(__('The Tool has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                }
            }
            $this->Flash->error(__($errorMessageInFlash));
        }

        $buttontypes = $this->Buttontypes->find('list', ['limit' => 200]);
        $buttontypes = $buttontypes->toArray();
        $this->set(compact('buttontypes'));
    }

    private function reindexArray($array)
    {
        $newArray = [];

        if (empty($array)) {
            return null;
        } else {
            $newArray = array_values($array);
        }
        return $newArray;
    }



}
