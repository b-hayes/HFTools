<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientsParticipantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientsParticipantsTable Test Case
 */
class ClientsParticipantsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientsParticipantsTable
     */
    public $ClientsParticipants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clients_participants',
        'app.clients',
        'app.sessions',
        'app.users',
        'app.participants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ClientsParticipants') ? [] : ['className' => ClientsParticipantsTable::class];
        $this->ClientsParticipants = TableRegistry::get('ClientsParticipants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClientsParticipants);

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
