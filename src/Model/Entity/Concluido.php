<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Concluido Entity
 *
 * @property int $id
 * @property string|null $data
 * @property int $projeto_id
 * @property int $passo_id
 *
 * @property \App\Model\Entity\Projeto $projeto
 * @property \App\Model\Entity\Passo $passo
 */
class Concluido extends Entity
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
        'data' => true,
        'projeto_id' => true,
        'passo_id' => true,
        'projeto' => true,
        'passo' => true
    ];

    protected function _getNome(){
        return $this->_properties['passo']->nome;
    }
}
