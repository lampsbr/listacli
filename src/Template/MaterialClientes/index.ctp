<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MaterialCliente[]|\Cake\Collection\CollectionInterface $materialClientes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Material Cliente'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materialClientes index large-9 medium-8 columns content">
    <h3><?= __('Material Clientes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_entrega') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('material_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materialClientes as $materialCliente): ?>
            <tr>
                <td><?= $this->Number->format($materialCliente->id) ?></td>
                <td><?= h($materialCliente->created) ?></td>
                <td><?= h($materialCliente->modified) ?></td>
                <td><?= h($materialCliente->deleted) ?></td>
                <td><?= h($materialCliente->data_entrega) ?></td>
                <td><?= $materialCliente->has('cliente') ? $this->Html->link($materialCliente->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $materialCliente->cliente->id]) : '' ?></td>
                <td><?= $materialCliente->has('material') ? $this->Html->link($materialCliente->material->id, ['controller' => 'Materials', 'action' => 'view', $materialCliente->material->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $materialCliente->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $materialCliente->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $materialCliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materialCliente->id)]) ?>
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
