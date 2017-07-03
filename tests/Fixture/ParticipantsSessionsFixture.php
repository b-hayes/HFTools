<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ParticipantsSessionsFixture
 *
 */
class ParticipantsSessionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'participant_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'session_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_sp_session2' => ['type' => 'index', 'columns' => ['session_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['participant_id', 'session_id'], 'length' => []],
            'fk_sp_participant1' => ['type' => 'foreign', 'columns' => ['participant_id'], 'references' => ['participants', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_sp_session2' => ['type' => 'foreign', 'columns' => ['session_id'], 'references' => ['sessions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'participant_id' => 1,
            'session_id' => 1
        ],
    ];
}
