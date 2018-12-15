<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Material Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property string $nome
 * @property string|null $descricao
 * @property string|resource|null $imagem
 * @property float $saldo_atual
 *
 * @property \App\Model\Entity\CompraMaterial[] $compra_materials
 * @property \App\Model\Entity\MaterialCliente[] $material_clientes
 */
class Material extends Entity
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
        'nome' => true,
        'descricao' => true,
        'imagem' => true,
        'saldo_atual' => true,
        'compra_materials' => true,
        'material_clientes' => true
    ];
}
