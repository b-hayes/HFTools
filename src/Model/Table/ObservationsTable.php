<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Observations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Participants
 * @property \Cake\ORM\Association\BelongsTo $Runs
 * @property \Cake\ORM\Association\HasMany $Results
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

        $this->table('observations');
        $this->displayField('id');
        $this->primaryKey('id');

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
        $this->hasMany('Results', [
            'foreignKey' => 'observation_id'
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

?>
