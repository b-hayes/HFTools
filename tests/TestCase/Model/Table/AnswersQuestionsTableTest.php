<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnswersQuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnswersQuestionsTable Test Case
 */
class AnswersQuestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnswersQuestionsTable
     */
    public $AnswersQuestions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.answers_questions',
        'app.questions',
        'app.sections',
        'app.questionnaires',
        'app.answers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AnswersQuestions') ? [] : ['className' => AnswersQuestionsTable::class];
        $this->AnswersQuestions = TableRegistry::get('AnswersQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AnswersQuestions);

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
