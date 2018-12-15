<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MaterialCliente $materialCliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Material Cliente'), ['action' => 'edit', $materialCliente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Material Cliente'), ['action' => 'delete', $materialCliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materialCliente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Material Clientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material Cliente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materialClientes view large-9 medium-8 columns content">
    <h3><?= h($materialCliente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $materialCliente->has('cliente') ? $this->Html->link($materialCliente->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $materialCliente->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Material') ?></th>
            <td><?= $materialCliente->has('material') ? $this->Html->link($materialCliente->material->id, ['controller' => 'Materials', 'action' => 'view', $materialCliente->material->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($materialCliente->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($materialCliente->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($materialCliente->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($materialCliente->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Entrega') ?></th>
            <td><?= h($materialCliente->data_entrega) ?></td>
        </tr>
    </table>
</div>
