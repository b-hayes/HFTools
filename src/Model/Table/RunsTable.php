<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Runs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Days
 * @property \Cake\ORM\Association\HasMany $Observations
 *
 * @method \App\Model\Entity\Run get($primaryKey, $options = [])
 * @method \App\Model\Entity\Run newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Run[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Run|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Run patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Run[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Run findOrCreate($search, callable $callback = null, $options = [])
 */
class RunsTable extends Table
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

        $this->table('runs');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Days', [
            'foreignKey' => 'day_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Observations', [
            'foreignKey' => 'run_id'
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

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['day_id'], 'Days'));

        return $rules;
    }
}
