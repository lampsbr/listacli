<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Material $material
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
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
<div class="materials view large-9 medium-8 columns content">
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
    </table>
    <div class="related">
        <h4><?= __('Compras realizadas') ?></h4>
        <?= $this->Html->link('Cadastrar compra', ['controller' => 'compra_materials', 'action' => 'add',$material->id],['class' =>'right']) ?>
        <?= $this->Html->image('icons/plus-square.svg',['class' => 'right', 'style' => 'margin-right: 0.5em;']) ?>
        <?php if (!empty($material->compra_materials)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Data Compra') ?></th>
                <th scope="col"><?= __('Data Chegada') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Preco') ?></th>
                <th scope="col"><?= __('Material Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($material->compra_materials as $compraMaterials): ?>
            <tr>
                <td><?= h($compraMaterials->id) ?></td>
                <td><?= h($compraMaterials->created) ?></td>
                <td><?= h($compraMaterials->modified) ?></td>
                <td><?= h($compraMaterials->deleted) ?></td>
                <td><?= h($compraMaterials->data_compra) ?></td>
                <td><?= h($compraMaterials->data_chegada) ?></td>
                <td><?= h($compraMaterials->observacao) ?></td>
                <td><?= h($compraMaterials->preco) ?></td>
                <td><?= h($compraMaterials->material_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CompraMaterials', 'action' => 'view', $compraMaterials->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CompraMaterials', 'action' => 'edit', $compraMaterials->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CompraMaterials', 'action' => 'delete', $compraMaterials->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compraMaterials->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Entregas a clientes') ?></h4>
        <?= $this->Html->link('Reservar para cliente', ['controller' => 'material_clientes', 'action' => 'add',$material->id],['class' =>'right']) ?>
        <?= $this->Html->image('icons/plus-square.svg',['class' => 'right', 'style' => 'margin-right: 0.5em;']) ?>
        <?php if (!empty($material->material_clientes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Data Entrega') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Material Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($material->material_clientes as $materialClientes): ?>
            <tr>
                <td><?= h($materialClientes->id) ?></td>
                <td><?= h($materialClientes->created) ?></td>
                <td><?= h($materialClientes->modified) ?></td>
                <td><?= h($materialClientes->deleted) ?></td>
                <td><?= h($materialClientes->data_entrega) ?></td>
                <td><?= h($materialClientes->cliente_id) ?></td>
                <td><?= h($materialClientes->material_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MaterialClientes', 'action' => 'view', $materialClientes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MaterialClientes', 'action' => 'edit', $materialClientes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MaterialClientes', 'action' => 'delete', $materialClientes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materialClientes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
