<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buttonvalues Model
 *
 * @property \App\Model\Table\ButtontypesTable|\Cake\ORM\Association\BelongsToMany $Buttontypes
 *
 * @method \App\Model\Entity\Buttonvalue get($primaryKey, $options = [])
 * @method \App\Model\Entity\Buttonvalue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Buttonvalue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Buttonvalue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buttonvalue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Buttonvalue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Buttonvalue findOrCreate($search, callable $callback = null, $options = [])
 */
class ButtonvaluesTable extends Table
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

        $this->setTable('buttonvalues');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Buttontypes', [
            'foreignKey' => 'buttonvalue_id',
            'targetForeignKey' => 'buttontype_id',
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
            ->requirePresence('text_lable', 'create')
            ->notEmpty('text_lable');

        $validator
            ->requirePresence('text_value', 'create')
            ->notEmpty('text_value');

        return $validator;
    }
}
