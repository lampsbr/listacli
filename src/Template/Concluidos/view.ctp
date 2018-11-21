<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Concluido $concluido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Concluido'), ['action' => 'edit', $concluido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Concluido'), ['action' => 'delete', $concluido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $concluido->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Concluidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Concluido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Passos'), ['controller' => 'Passos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passo'), ['controller' => 'Passos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="concluidos view large-9 medium-8 columns content">
    <h3><?= h($concluido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($concluido->data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Projeto') ?></th>
            <td><?= $concluido->has('projeto') ? $this->Html->link($concluido->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $concluido->projeto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Passo') ?></th>
            <td><?= $concluido->has('passo') ? $this->Html->link($concluido->passo->idpassos, ['controller' => 'Passos', 'action' => 'view', $concluido->passo->idpassos]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($concluido->id) ?></td>
        </tr>
    </table>
</div>
