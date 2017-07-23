<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * AnswersObservations Model
 *
 * @property \App\Model\Table\ObservationsTable|\Cake\ORM\Association\BelongsTo $Observations
 * @property \App\Model\Table\AnswersTable|\Cake\ORM\Association\BelongsTo $Answers
 *
 * @method \App\Model\Entity\AnswersObservation get($primaryKey, $options = [])
 * @method \App\Model\Entity\AnswersObservation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AnswersObservation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AnswersObservation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AnswersObservation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AnswersObservation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AnswersObservation findOrCreate($search, callable $callback = null, $options = [])
 */
class AnswersObservationsTable extends Table
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

        $this->setTable('answers_observations');
        $this->setDisplayField('observation_id');
        $this->setPrimaryKey(['observation_id', 'answer_id']);

        $this->belongsTo('Observations', [
            'foreignKey' => 'observation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Answers', [
            'foreignKey' => 'answer_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['observation_id'], 'Observations'));
        $rules->add($rules->existsIn(['answer_id'], 'Answers'));

        return $rules;
    }
}
