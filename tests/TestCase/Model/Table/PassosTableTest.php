<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PassosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PassosTable Test Case
 */
class PassosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PassosTable
     */
    public $Passos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.passos',
        'app.modelos',
        'app.concluidos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Passos') ? [] : ['className' => PassosTable::class];
        $this->Passos = TableRegistry::getTableLocator()->get('Passos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Passos);

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
