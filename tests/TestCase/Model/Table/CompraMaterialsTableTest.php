<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompraMaterialsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompraMaterialsTable Test Case
 */
class CompraMaterialsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompraMaterialsTable
     */
    public $CompraMaterials;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.compra_materials',
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
        $config = TableRegistry::getTableLocator()->exists('CompraMaterials') ? [] : ['className' => CompraMaterialsTable::class];
        $this->CompraMaterials = TableRegistry::getTableLocator()->get('CompraMaterials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompraMaterials);

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
