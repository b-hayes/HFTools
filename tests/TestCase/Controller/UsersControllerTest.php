<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.clients',
        'app.sessions',
        'app.days',
        'app.runs',
        'app.observations',
        'app.participants',
        'app.clients_participants',
        'app.roles',
        'app.participants_roles'
    ];

    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
        TableRegistry::clear();
    }

    /**
     * test that the login page is accessible.
     */
    public function testLoginAccessible()
    {
        $this->get(['controller' => 'Users', 'action' => 'login']);
        $this->assertResponseCode(200);
        $this->assertNoRedirect();
    }

    /**
     * Test that users who are not logged in are redirected.
     */
    public function testRedirectToLogin()
    {
        $this->get(['controller' => 'Clients', 'action' => 'index']);
        $this->assertResponseCode(302);
        $this->assertRedirect('/users/login');
    }

    /**
     * Checks that if a user is already logged in that they can't still access
     * the login page.
     */
    public function testLoginLoggedIn()
    {
        $fake_session_data = [
            'Auth' =>
                ['User' =>
                    ['id' => 1, 'username' => 'devtest', 'role' => 'admin']
                ]
        ];

        /* this is calling the users/login page with a fake session
        the fake session will simulate an already logged in user. If already
        logged in then check the redirect occurred and to the correct
        location */
        $this->session($fake_session_data);
        $this->get(['controller' => 'Users', 'action' => 'login']);
        $this->assertResponseCode(302);
        $this->assertRedirect('/users/home');
    }

    /**
     * Test that a valid user can login
     *
     * @return void
     */
    public function testLoginPostValidData()
    {
        // create a mock user
        $data = [
            'username' => 'devtest',
            'password' => 'password',
            'role' => 'admin'
        ];

        //get the user table object and insert the mock user
        $this->Users = TableRegistry::get('Users');
        $user = $this->Users->newEntity($data);
        $result = $this->Users->save($user);

        // check that the user was successfully created.
        $this->assertTrue((bool)$result);

        // use the username and password for the user we just created.
        $data = [
            'username' => 'devtest',
            'password' => 'password',
        ];

        /* post our username and password to the login function and check that
        we are redirected (302) and that the page we are redirected to is the
        users index. */
        $this->post(['controller' => 'Users', 'action' => 'login'], $data);
        $this->assertResponseCode(302);
        $this->assertRedirect('/users/homes');
    }

    /**
     * test that invalid user data send via post to login works correctly by
     * denying access and not redirecting to /users
     *
     * @return void
     */
    public function testLoginPostInvalidData()
    {

        // login details
        $data = [
            'username' => 'devtest',
            'password' => 'pass',
        ];

        // post request to login.
        $this->post(['controller' => 'Users', 'action' => 'login'], $data);
        $this->assertResponseCode(200);
        $this->assertNoRedirect();
    }


    /**
     * check that when selecting logout, the user is redirected
     */
    public function testLogout()
    {
        // current session mock
        $fake_session_data = [
            'Auth' =>
                ['User' =>
                    ['id' => 1, 'username' => 'devtest', 'role' => 'admin']
                ]
        ];

        /* create the mock session, then call the logout and check that the
        redirect occurred and the location of the redirect is correct */
        $this->session($fake_session_data);
        $this->get(['controller' => 'Users', 'action' => 'logout']);
        $this->assertResponseCode(302);
        $this->assertRedirect('/users/login');
    }

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
