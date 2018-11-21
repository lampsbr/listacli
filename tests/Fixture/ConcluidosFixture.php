<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConcluidosFixture
 *
 */
class ConcluidosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'data' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'projeto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'passo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_concluidos_projetos1_idx' => ['type' => 'index', 'columns' => ['projeto_id'], 'length' => []],
            'fk_concluidos_passos1_idx' => ['type' => 'index', 'columns' => ['passo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_concluidos_passos1' => ['type' => 'foreign', 'columns' => ['passo_id'], 'references' => ['passos', 'idpassos'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_concluidos_projetos1' => ['type' => 'foreign', 'columns' => ['projeto_id'], 'references' => ['projetos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'data' => 'Lorem ipsum dolor sit amet',
                'projeto_id' => 1,
                'passo_id' => 1
            ],
        ];
        parent::init();
    }
}
