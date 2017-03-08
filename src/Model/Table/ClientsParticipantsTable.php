<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * ClientsParticipants Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\BelongsTo $Participants
 *
 * @method \App\Model\Entity\ClientsParticipant get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClientsParticipant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ClientsParticipant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClientsParticipant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClientsParticipant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClientsParticipant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClientsParticipant findOrCreate($search, callable $callback = null, $options = [])
 */
class ClientsParticipantsTable extends Table
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

        $this->table('clients_participants');
        $this->displayField('client_id');
        $this->primaryKey(['client_id', 'participant_id']);

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Participants', [
            'foreignKey' => 'participant_id',
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
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        $rules->add($rules->existsIn(['participant_id'], 'Participants'));

        return $rules;
    }
}
