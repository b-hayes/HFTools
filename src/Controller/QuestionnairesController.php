<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Questionnaire;
use function debug;
use function is_null;
use const null;
use function print_r;

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
        $this->request->allowMethod(['post', 'delete']);
        $questionnaire = $this->Questionnaires->get($id);
        if ($this->Questionnaires->delete($questionnaire)) {
            $this->Flash->success(__('The questionnaire has been deleted.'));
        } else {
            $this->Flash->error(__('The questionnaire could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    private function reindexArray($array)
    {
        $newArray = [];

        if (empty($array)) {
            return null;
        } else {
            $newArray = array_values($this->request->getData('section'));
        }
        return $newArray;
    }


    public function create()
    {
        $hasProvidedRelevantInformation = true;
        $errorMessageInFlash = 'The questionnaire could not be saved. Please, try again.';

        $questionnaire = $this->Questionnaires->newEntity();

        if ($this->request->is('post')) {
            $sectionsArray = []; // As request getData (array format) is retrieved it needs to be converted and stored in order to attach to parent object.

            // New Checklist is created
            $questionnaire = $this->Questionnaires->patchEntity($questionnaire, $this->request->getData(), [
                    'associated' => [
                        'Sections' => ['associated' => ['Questions']]
                    ]]
            );

            // array_values re-indexes the post array.. so if sections removed it sorts them. i.e if indexes are 1, 2, 5 array_value will return 0, 1, 2
            $dataSection = $this->reindexArray($this->request->getData('section'));

            // All the Items on the form are contained into a variable
            $sections = $this->Questionnaires->Sections->newEntities($dataSection);

            if (!empty($sections)) {
                foreach ($sections as $section) {
                    $questionsArray = [];

                    if(empty($section->name)) {
                        $hasProvidedRelevantInformation = false;
                        $errorMessageInFlash = 'You need to provide each section with a name';
                        break;
                    }

                    $newSec = $this->Questionnaires->Sections->newEntity();
                    $newSec->name = $section->name;
                    $newSec->description = $section->description;

                    if (empty($section->question)) {
                        $hasProvidedRelevantInformation = false;
                        $errorMessageInFlash = 'You need to have at least one question for each section!';
                        break;
                    }

                    $dataQuestions = $this->reindexArray($section->question);
                    $questions = $this->Questionnaires->Sections->Questions->newEntities($dataQuestions);

                    foreach ($questions as $question) {

                        if(empty($question['question'][0]['text'])) {
                            $hasProvidedRelevantInformation = false;
                            $errorMessageInFlash = 'All questions must have text!';
                            break;
                        }

                        $newQuestion = $this->Questionnaires->Sections->Questions->newEntity();
                        $newQuestion->text = $question['question'][0]['text'];
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
                $this->Flash->error(__($errorMessageInFlash));
            }
        }
    }


}
