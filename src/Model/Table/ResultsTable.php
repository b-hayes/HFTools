<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Results Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Observations
 *
 * @method \App\Model\Entity\Result get($primaryKey, $options = [])
 * @method \App\Model\Entity\Result newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Result[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Result|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Result patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Result[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Result findOrCreate($search, callable $callback = null, $options = [])
 */
class ResultsTable extends Table
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

        $this->table('results');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Observations', [
            'foreignKey' => 'observation_id',
            'joinType' => 'INNER'
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
//        $validator
//            ->integer('id')
//            ->allowEmpty('id', 'create');
//
//        $validator
//            ->requirePresence('q_key', 'create')
//            ->notEmpty('q_key');
//
//        $validator
//            ->requirePresence('q_value', 'create')
//            ->notEmpty('q_value');
//
//        // i added these
//
//        $validator
//            ->requirePresence('q_key', 'create')
//            ->notEmpty('q_key');
//
//        $validator
//            ->requirePresence('q_value', 'create')
//            ->notEmpty('q_value');
//
//        $validator
//            ->allowEmpty('img');


        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('q_key', 'create')
            ->notEmpty('q_key');

        $validator
            ->requirePresence('q_value', 'create')
            ->notEmpty('q_value');

        $validator
            ->allowEmpty('img');

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
        $rules->add($rules->existsIn(['observation_id'], 'Observations'));

        return $rules;
    }
}
