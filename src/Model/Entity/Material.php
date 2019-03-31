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
        '*' => true
    ];


    protected function _getSomaNaoEntregue(){
        if(is_null($this->material_clientes) || empty($this->material_clientes)){
            return 0;
        }
        $retorno = 0;
        //varrer o array e contar quantos material_clientes NÃO foram entregues
        foreach ($this->material_clientes as $mc) {
            if(is_null($mc->data_entrega)){
                $retorno++;
            }
        }
        return $retorno;
    }

    protected function _getSomaJaEntregue(){
        if(is_null($this->material_clientes) || empty($this->material_clientes)){
            return 0;
        }
        $retorno = 0;
        //varrer o array e contar quantos material_clientes já foram entregues
        foreach ($this->material_clientes as $mc) {
            if(!is_null($mc->data_entrega)){
                $retorno++;
            }
        }
        return $retorno;
    }
}
