<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ButtontypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ButtontypesTable Test Case
 */
class ButtontypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ButtontypesTable
     */
    public $Buttontypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.buttontypes',
        'app.sections',
        'app.questionnaires',
        'app.questions',
        'app.answers',
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
        'app.answers_observations',
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
        $config = TableRegistry::exists('Buttontypes') ? [] : ['className' => ButtontypesTable::class];
        $this->Buttontypes = TableRegistry::get('Buttontypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Buttontypes);

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
}
