<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Days Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sessions
 * @property \Cake\ORM\Association\HasMany $Runs
 *
 * @method \App\Model\Entity\Day get($primaryKey, $options = [])
 * @method \App\Model\Entity\Day newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Day[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Day|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Day patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Day[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Day findOrCreate($search, callable $callback = null, $options = [])
 */
class DaysTable extends Table
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

        $this->table('days');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Runs', [
            'foreignKey' => 'day_id'
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
            ->date('day_date')
            ->requirePresence('day_date', 'create')
            ->notEmpty('day_date');

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
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));

        return $rules;
    }
}
