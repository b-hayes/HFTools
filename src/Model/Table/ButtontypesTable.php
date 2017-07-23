<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buttontypes Model
 *
 * @property \App\Model\Table\SectionsTable|\Cake\ORM\Association\HasMany $Sections
 * @property \App\Model\Table\ButtonvaluesTable|\Cake\ORM\Association\BelongsToMany $Buttonvalues
 *
 * @method \App\Model\Entity\Buttontype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Buttontype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Buttontype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Buttontype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buttontype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Buttontype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Buttontype findOrCreate($search, callable $callback = null, $options = [])
 */
class ButtontypesTable extends Table
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

        $this->setTable('buttontypes');
        $this->setDisplayField('text');
        $this->setPrimaryKey('id');

        $this->hasMany('Sections', [
            'foreignKey' => 'buttontype_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
        $this->belongsToMany('Buttonvalues', [
            'foreignKey' => 'buttontype_id',
            'targetForeignKey' => 'buttonvalue_id',
            'joinTable' => 'buttontypes_buttonvalues'
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
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        return $validator;
    }
}
