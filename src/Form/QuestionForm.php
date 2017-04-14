<?php
/**
 * Created by IntelliJ IDEA.
 * User: danielrichardson
 * Date: 13/4/17
 * Time: 11:28 AM
 */

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;


class QuestionForm extends Form
{
    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('question', 'string')
            ->addField('answer', ['type' => 'string'])
            ->addField('question', ['type' => 'text']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('name', 'length', [
            'rule' => ['minLength', 10],
            'message' => 'A name is required'
        ])->add('email', 'format', [
            'rule' => 'email',
            'message' => 'A valid email address is required',
        ]);
    }

    protected function _execute(array $data)
    {
        // Send an email.
        return true;
    }

}
