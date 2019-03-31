<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Material $material
 */
?>
<nav class="medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Material'), ['action' => 'edit', $material->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Material'), ['action' => 'delete', $material->id], ['confirm' => __('Are you sure you want to delete # {0}?', $material->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Compra Materials'), ['controller' => 'CompraMaterials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Compra Material'), ['controller' => 'CompraMaterials', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Material Clientes'), ['controller' => 'MaterialClientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material Cliente'), ['controller' => 'MaterialClientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materials view medium-9 columns content">
    <h3><?= h($material->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($material->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Saldo Atual') ?></th>
            <td><?= $this->Number->format($material->saldo_atual) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade JÁ entregue') ?></th>
            <td><?= $this->Number->format($material->somaJaEntregue) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ainda falta entregar') ?></th>
            <td><?= $this->Number->format($material->somaNaoEntregue) ?></td>
        </tr>
    </table>
    <br/>
    <div class="related">
        <h4><?= __('Compras realizadas') ?></h4>
        <?= $this->Html->link('Cadastrar compra', ['controller' => 'compra_materials', 'action' => 'add',$material->id],['class' =>'right']) ?>
        <?= $this->Html->image('icons/plus-square.svg',['class' => 'right', 'style' => 'margin-right: 0.5em;']) ?>
        <?php if (!empty($material->compra_materials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Data Compra') ?></th>
                <th scope="col"><?= __('Data Chegada') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Preco') ?></th>
                <th scope="col"><?= __('Quantidade') ?></th>
                <th scope="col" class="actions"><?= __('AÇÕES') ?></th>
            </tr>
            <?php foreach ($material->compra_materials as $compraMaterials): ?>
            <tr>
                <td><?= h($compraMaterials->data_compra) ?></td>
                <td><?= h($compraMaterials->data_chegada) ?></td>
                <td><?= h($compraMaterials->observacao) ?></td>
                <td><?= h($compraMaterials->preco) ?></td>
                <td><?= h($compraMaterials->quantidade) ?></td>
                <td class="actions">
                    <?php 
                        if (empty($compraMaterials->data_chegada)){
                            echo $this->Html->link(__('Marcar chegada'), ['controller' => 'CompraMaterials', 'action' => 'chegou', $compraMaterials->id]);
                            echo $this->Form->postLink(__('Apagar'), ['controller' => 'CompraMaterials', 'action' => 'delete', $compraMaterials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compraMaterials->id)]);
                        } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <br/>
    <div class="related">
        <h4><?= __('Entregas a clientes') ?></h4>
        <?= $this->Html->link('Reservar para cliente', ['controller' => 'material_clientes', 'action' => 'add',$material->id],['class' =>'right']) ?>
        <?= $this->Html->image('icons/plus-square.svg',['class' => 'right', 'style' => 'margin-right: 0.5em;']) ?>
        <?php if (!empty($material->material_clientes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Data Entrega') ?></th>
                <th scope="col"><?= __('Cliente') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($material->material_clientes as $materialClientes): ?>
            <tr>
                <td><?= h($materialClientes->data_entrega) ?></td>
                <td><?= h($materialClientes->cliente->nome) ?></td>
                <td class="actions">
                <?php 
                    if (empty($materialClientes->data_entrega)){
                        echo $this->Html->link(__('Foi entregue!'), ['controller' => 'MaterialClientes', 'action' => 'entregou', $materialClientes->id]);
                        echo $this->Form->postLink(__('Apagar'), ['controller' => 'MaterialClientes', 'action' => 'delete', $materialClientes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compraMaterials->id)]);
                    } 
                ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
