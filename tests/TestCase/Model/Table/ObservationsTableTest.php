<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObservationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObservationsTable Test Case
 */
class ObservationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ObservationsTable
     */
    public $Observations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.answers_observations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Observations') ? [] : ['className' => ObservationsTable::class];
        $this->Observations = TableRegistry::get('Observations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Observations);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
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
