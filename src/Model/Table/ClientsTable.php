<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clients Model
 *
 * @property \App\Model\Table\SessionsTable|\Cake\ORM\Association\HasMany $Sessions
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 * @property \App\Model\Table\ParticipantsTable|\Cake\ORM\Association\BelongsToMany $Participants
 *
 * @method \App\Model\Entity\Client get($primaryKey, $options = [])
 * @method \App\Model\Entity\Client newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Client[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client findOrCreate($search, callable $callback = null, $options = [])
 */
class ClientsTable extends Table
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

        $this->setTable('clients');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Sessions', [
            'foreignKey' => 'client_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'client_id'
        ]);
        $this->belongsToMany('Participants', [
            'foreignKey' => 'client_id',
            'targetForeignKey' => 'participant_id',
            'joinTable' => 'clients_participants'
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
            ->allowEmpty('address');

        $validator
            ->requirePresence('client_number', 'create')
            ->notEmpty('client_number');

        $validator
            ->requirePresence('contact_number', 'create')
            ->notEmpty('contact_number');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->requirePresence('contact_person', 'create')
            ->notEmpty('contact_person');

        $validator
            ->dateTime('acount_created')
            ->allowEmpty('acount_created');

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
