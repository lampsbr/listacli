<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaterialClientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaterialClientesTable Test Case
 */
class MaterialClientesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MaterialClientesTable
     */
    public $MaterialClientes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.material_clientes',
        'app.clientes',
        'app.materials'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MaterialClientes') ? [] : ['className' => MaterialClientesTable::class];
        $this->MaterialClientes = TableRegistry::getTableLocator()->get('MaterialClientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MaterialClientes);

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
