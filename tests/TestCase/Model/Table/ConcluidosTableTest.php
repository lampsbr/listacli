<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConcluidosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConcluidosTable Test Case
 */
class ConcluidosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConcluidosTable
     */
    public $Concluidos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.concluidos',
        'app.projetos',
        'app.passos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Concluidos') ? [] : ['className' => ConcluidosTable::class];
        $this->Concluidos = TableRegistry::getTableLocator()->get('Concluidos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Concluidos);

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
