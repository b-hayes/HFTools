<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RunsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RunsTable Test Case
 */
class RunsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RunsTable
     */
    public $Runs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.runs',
        'app.sessions',
        'app.observations',
        'app.participants',
        'app.clients',
        'app.users',
        'app.clients_participants',
        'app.roles',
        'app.participants_roles',
        'app.participants_sessions',
        'app.answers',
        'app.questions',
        'app.sections',
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
        $config = TableRegistry::exists('Runs') ? [] : ['className' => RunsTable::class];
        $this->Runs = TableRegistry::get('Runs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Runs);

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
