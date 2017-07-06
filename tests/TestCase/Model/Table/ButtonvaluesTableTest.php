<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ButtonvaluesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ButtonvaluesTable Test Case
 */
class ButtonvaluesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ButtonvaluesTable
     */
    public $Buttonvalues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.buttonvalues',
        'app.buttontypes',
        'app.sections',
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
        $config = TableRegistry::exists('Buttonvalues') ? [] : ['className' => ButtonvaluesTable::class];
        $this->Buttonvalues = TableRegistry::get('Buttonvalues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Buttonvalues);

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
