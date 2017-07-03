<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParticipantsSessionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParticipantsSessionsTable Test Case
 */
class ParticipantsSessionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ParticipantsSessionsTable
     */
    public $ParticipantsSessions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.participants_sessions',
        'app.participants',
        'app.observations',
        'app.runs',
        'app.answers',
        'app.questions',
        'app.clients',
        'app.sessions',
        'app.users',
        'app.clients_participants',
        'app.roles',
        'app.participants_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ParticipantsSessions') ? [] : ['className' => ParticipantsSessionsTable::class];
        $this->ParticipantsSessions = TableRegistry::get('ParticipantsSessions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ParticipantsSessions);

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
