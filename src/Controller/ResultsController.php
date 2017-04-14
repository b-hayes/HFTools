<?php
namespace App\Controller;
use Cake\Database\Schema\Table;
use Cake\ORM\TableRegistry;

/**
 * Results Controller
 *
 * @property \App\Model\Table\ResultsTable $Results
 */
class ResultsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Observations']
        ];
        $results = $this->paginate($this->Results);

        $this->set(compact('results'));
        $this->set('_serialize', ['results']);
    }

    public function dataForvisual() {
        $col1=array();
        $col1["id"]="";
        $col1["label"]="Topping";
        $col1["pattern"]="";
        $col1["type"]="string";
//print_r($col1);
        $col2=array();
        $col2["id"]="";
        $col2["label"]="Slices";
        $col2["pattern"]="";
        $col2["type"]="number";
//print_r($col2);
        $cols = array($col1,$col2);
//print_r($cols);

        $cell0["v"]="Mushrooms";
        $cell0["f"]=null;
        $cell1["v"]=3;
        $cell1["f"]=null;
        $row0["c"]=array($cell0,$cell1);

        $cell0["v"]="Onion";
        $cell1["v"]=1;
        $row1["c"]=array($cell0,$cell1);

        $cell0["v"]="Olives";
        $cell1["v"]=1;
        $row2["c"]=array($cell0,$cell1);

        $cell0["v"]="Zucchini";
        $cell1["v"]=1;
        $row3["c"]=array($cell0,$cell1);

        $cell0["v"]="Pepperoni";
        $cell1["v"]=2;
        $row4["c"]=array($cell0,$cell1);

//$rows=array($row0,$row1,$row2,$row3,$row4);
        $rows=array();
        array_push($rows,$row0);
        array_push($rows,$row1);
        array_push($rows,$row2);
        array_push($rows,$row3);
        array_push($rows,$row4);


//print_r($rows);

        $data=array("cols"=>$cols,"rows"=>$rows);
//print_r($data);
        echo json_encode($data);
    }

    /***
     * this will be used to display results visually when a session/day/run is complete
     */
    public function home() {

    }

    /**
     * View method
     *
     * @param string|null $id Result id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $result = $this->Results->get($id, [
            'contain' => ['Observations']
        ]);

        $this->set('result', $result);
        $this->set('_serialize', ['result']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $result = $this->Results->newEntity();

        if ($this->request->is('post')) {

                $result = $this->Results->patchEntity($result, $this->request->data);

                if ($this->Results->save($result)) {
                    $this->Flash->success(__('The result has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The result could not be saved. Please, try again.'));
            }


        $observations = $this->Results->Observations->find('list', ['limit' => 200]);
        $this->set(compact('result', 'observations'));
        $this->set('_serialize', ['result']);
    }


    function multiadd()
    {

        if ($this->request->is('post')) {

            var_dump($this->request->data);

            $results = TableRegistry::get('Results');
            $entities = $results->newEntities($this->request->data);
            // In a controller.
            foreach ($entities as $entity) {
                // Save entity
                if ($this->Results->save($entity)) {
//                    $this->Flash->success(__('The result has been saved.'));
//
//                    return $this->redirect(['action' => 'index']);
                }

            }
        }

        $observations = $this->Results->Observations->find('list', ['limit' => 200]);
        $this->set(compact('result', 'observations'));
        $this->set('_serialize', ['result']);

    }
    /**
     * Edit method
     *
     * @param string|null $id Result id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $result = $this->Results->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $result = $this->Results->patchEntity($result, $this->request->data);
            if ($this->Results->save($result)) {
                $this->Flash->success(__('The result has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The result could not be saved. Please, try again.'));
        }
        $observations = $this->Results->Observations->find('list', ['limit' => 200]);
        $this->set(compact('result', 'observations'));
        $this->set('_serialize', ['result']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Result id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $result = $this->Results->get($id);
        if ($this->Results->delete($result)) {
            $this->Flash->success(__('The result has been deleted.'));
        } else {
            $this->Flash->error(__('The result could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
