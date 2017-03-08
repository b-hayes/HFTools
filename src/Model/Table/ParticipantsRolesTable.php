<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * ParticipantsRoles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Participants
 * @property \Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\ParticipantsRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\ParticipantsRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ParticipantsRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ParticipantsRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ParticipantsRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ParticipantsRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ParticipantsRole findOrCreate($search, callable $callback = null, $options = [])
 */
class ParticipantsRolesTable extends Table
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

        $this->table('participants_roles');
        $this->displayField('participant_id');
        $this->primaryKey(['participant_id', 'role_id']);

        $this->belongsTo('Participants', [
            'foreignKey' => 'participant_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
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
        $rules->add($rules->existsIn(['participant_id'], 'Participants'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
}
