<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ObservationsFixture
 *
 */
class ObservationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'observer_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'participant_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'run_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_o_obs1' => ['type' => 'index', 'columns' => ['observer_id'], 'length' => []],
            'fk_o_run2' => ['type' => 'index', 'columns' => ['run_id'], 'length' => []],
            'fk_o_participant1' => ['type' => 'index', 'columns' => ['participant_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_o_obs1' => ['type' => 'foreign', 'columns' => ['observer_id'], 'references' => ['participants', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_o_participant1' => ['type' => 'foreign', 'columns' => ['participant_id'], 'references' => ['participants', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_o_run2' => ['type' => 'foreign', 'columns' => ['run_id'], 'references' => ['runs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id' => 1,
            'observer_id' => 1,
            'participant_id' => 1,
            'run_id' => 1
        ],
    ];
}
