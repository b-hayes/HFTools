<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Observations Model
 *
 * @property \App\Model\Table\ParticipantsTable|\Cake\ORM\Association\BelongsTo $Participants
 * @property \App\Model\Table\RunsTable|\Cake\ORM\Association\BelongsTo $Runs
 * @property \App\Model\Table\AnswersTable|\Cake\ORM\Association\BelongsToMany $Answers
 *
 * @method \App\Model\Entity\Observation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Observation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Observation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Observation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Observation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Observation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Observation findOrCreate($search, callable $callback = null, $options = [])
 */
class ObservationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('observations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Participants', [
            'foreignKey' => 'observer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Participants', [
            'foreignKey' => 'participant_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Runs', [
            'foreignKey' => 'run_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Answers', [
            'foreignKey' => 'observation_id',
            'targetForeignKey' => 'answer_id',
            'joinTable' => 'answers_observations'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['observer_id'], 'Participants'));
        $rules->add($rules->existsIn(['participant_id'], 'Participants'));
        $rules->add($rules->existsIn(['run_id'], 'Runs'));

        return $rules;
    }
}
