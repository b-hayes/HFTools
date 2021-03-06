<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Participants Model
 *
 * @property \App\Model\Table\ObservationsTable|\Cake\ORM\Association\HasMany $Observations
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsToMany $Clients
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsToMany $Roles
 * @property \App\Model\Table\SessionsTable|\Cake\ORM\Association\BelongsToMany $Sessions
 *
 * @method \App\Model\Entity\Participant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Participant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Participant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Participant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Participant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Participant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Participant findOrCreate($search, callable $callback = null, $options = [])
 */
class ParticipantsTable extends Table
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

        $this->setTable('participants');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Observations', [
            'foreignKey' => 'participant_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->belongsToMany('Clients', [
            'foreignKey' => 'participant_id',
            'targetForeignKey' => 'client_id',
            'joinTable' => 'clients_participants'
        ]);
        $this->belongsToMany('Roles', [
            'foreignKey' => 'participant_id',
            'targetForeignKey' => 'role_id',
            'joinTable' => 'participants_roles',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->belongsToMany('Sessions', [
            'foreignKey' => 'participant_id',
            'targetForeignKey' => 'session_id',
            'joinTable' => 'participants_sessions',
            'dependent' => true,
            'cascadeCallbacks' => true
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('phone');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
