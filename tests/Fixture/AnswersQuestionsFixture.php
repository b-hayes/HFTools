<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AnswersQuestionsFixture
 *
 */
class AnswersQuestionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'question_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'answer_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_aq_answer2' => ['type' => 'index', 'columns' => ['answer_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['question_id', 'answer_id'], 'length' => []],
            'fk_aq_answer2' => ['type' => 'foreign', 'columns' => ['answer_id'], 'references' => ['answers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_aq_question1' => ['type' => 'foreign', 'columns' => ['question_id'], 'references' => ['questions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'question_id' => 1,
            'answer_id' => 1
        ],
    ];
}
