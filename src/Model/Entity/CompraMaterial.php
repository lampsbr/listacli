<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CompraMaterial Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property \Cake\I18n\FrozenTime $data_compra
 * @property \Cake\I18n\FrozenTime|null $data_chegada
 * @property string|null $observacao
 * @property float|null $preco
 * @property int $material_id
 *
 * @property \App\Model\Entity\Material $material
 */
class CompraMaterial extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'data_compra' => true,
        'data_chegada' => true,
        'observacao' => true,
        'preco' => true,
        'material_id' => true,
        'material' => true
    ];
}
