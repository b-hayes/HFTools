<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\SanitiseComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\SanitiseComponent Test Case
 */
class SanitiseComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\SanitiseComponent
     */
    public $Sanitise;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Sanitise = new SanitiseComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sanitise);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
