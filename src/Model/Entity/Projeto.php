<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Projeto Entity
 *
 * @property int $id
 * @property string|null $observacao
 * @property int $modelo_id
 * @property int $cliente_id
 *
 * @property \App\Model\Entity\Modelo $modelo
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\Concluido[] $concluidos
 */
class Projeto extends Entity
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
        'observacao' => true,
        'modelo_id' => true,
        'cliente_id' => true,
        'modelo' => true,
        'cliente' => true,
        'concluidos' => true
    ];

    protected function _getDescricao(){
        return $this->_properties['modelo']->nome . ' - ' .
             $this->_properties['cliente']->nome;
    }

    protected function _getEtapasConcluidas(){
        //debug($this->_properties);
        $retorno = '';
        if(isset($this->_properties['concluidos'])){
            foreach ($this->_properties['concluidos'] as $key => $value) {
                if(strlen($retorno)>0) $retorno .=', ';
                $retorno .= $value->passo->nome;
            }
        }
        return $retorno;
    }


}
