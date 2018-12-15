<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompraMaterial $compraMaterial
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Compra Material'), ['action' => 'edit', $compraMaterial->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Compra Material'), ['action' => 'delete', $compraMaterial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compraMaterial->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Compra Materials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Compra Material'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="compraMaterials view large-9 medium-8 columns content">
    <h3><?= h($compraMaterial->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Material') ?></th>
            <td><?= $compraMaterial->has('material') ? $this->Html->link($compraMaterial->material->id, ['controller' => 'Materials', 'action' => 'view', $compraMaterial->material->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($compraMaterial->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Preco') ?></th>
            <td><?= $this->Number->format($compraMaterial->preco) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($compraMaterial->quantidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($compraMaterial->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($compraMaterial->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($compraMaterial->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Compra') ?></th>
            <td><?= h($compraMaterial->data_compra) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Chegada') ?></th>
            <td><?= h($compraMaterial->data_chegada) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observacao') ?></h4>
        <?= $this->Text->autoParagraph(h($compraMaterial->observacao)); ?>
    </div>
</div>
