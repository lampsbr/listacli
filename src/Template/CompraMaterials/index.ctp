<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompraMaterial[]|\Cake\Collection\CollectionInterface $compraMaterials
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Compra Material'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="compraMaterials index large-9 medium-8 columns content">
    <h3><?= __('Compra Materials') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_compra') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_chegada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('preco') ?></th>
                <th scope="col"><?= $this->Paginator->sort('material_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantidade') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($compraMaterials as $compraMaterial): ?>
            <tr>
                <td><?= $this->Number->format($compraMaterial->id) ?></td>
                <td><?= h($compraMaterial->created) ?></td>
                <td><?= h($compraMaterial->modified) ?></td>
                <td><?= h($compraMaterial->deleted) ?></td>
                <td><?= h($compraMaterial->data_compra) ?></td>
                <td><?= h($compraMaterial->data_chegada) ?></td>
                <td><?= $this->Number->format($compraMaterial->preco) ?></td>
                <td><?= $compraMaterial->has('material') ? $this->Html->link($compraMaterial->material->nome, ['controller' => 'Materials', 'action' => 'view', $compraMaterial->material->id]) : '' ?></td>
                <td><?= $this->Number->format($compraMaterial->quantidade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $compraMaterial->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $compraMaterial->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $compraMaterial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compraMaterial->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
