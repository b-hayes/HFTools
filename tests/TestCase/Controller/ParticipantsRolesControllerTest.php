<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ParticipantsRolesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ParticipantsRolesController Test Case
 */
class ParticipantsRolesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.participants_roles',
        'app.participants',
        'app.observations',
        'app.runs',
        'app.answers',
        'app.questions',
        'app.clients',
        'app.sessions',
        'app.participants_sessions',
        'app.users',
        'app.clients_participants',
        'app.roles'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
