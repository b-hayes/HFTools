<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnswersObservationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnswersObservationsTable Test Case
 */
class AnswersObservationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnswersObservationsTable
     */
    public $AnswersObservations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.answers_observations',
        'app.observations',
        'app.participants',
        'app.clients',
        'app.sessions',
        'app.runs',
        'app.participants_sessions',
        'app.users',
        'app.clients_participants',
        'app.roles',
        'app.participants_roles',
        'app.answers',
        'app.questions',
        'app.sections',
        'app.questionnaires',
        'app.buttontypes',
        'app.buttonvalues',
        'app.buttontypes_buttonvalues'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AnswersObservations') ? [] : ['className' => AnswersObservationsTable::class];
        $this->AnswersObservations = TableRegistry::get('AnswersObservations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AnswersObservations);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
