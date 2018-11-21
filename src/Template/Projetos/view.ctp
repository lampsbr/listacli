<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto $projeto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Projeto'), ['action' => 'edit', $projeto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Projeto'), ['action' => 'delete', $projeto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projeto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Concluidos'), ['controller' => 'Concluidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Concluido'), ['controller' => 'Concluidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projetos view large-9 medium-8 columns content">
    <h3><?= h($projeto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Observacao') ?></th>
            <td><?= h($projeto->observacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modelo') ?></th>
            <td><?= $projeto->has('modelo') ? $this->Html->link($projeto->modelo->id, ['controller' => 'Modelos', 'action' => 'view', $projeto->modelo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $projeto->has('cliente') ? $this->Html->link($projeto->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $projeto->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projeto->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Concluidos') ?></h4>
        <?php if (!empty($projeto->concluidos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Passo Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($projeto->concluidos as $concluidos): ?>
            <tr>
                <td><?= h($concluidos->id) ?></td>
                <td><?= h($concluidos->data) ?></td>
                <td><?= h($concluidos->projeto_id) ?></td>
                <td><?= h($concluidos->passo_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Concluidos', 'action' => 'view', $concluidos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Concluidos', 'action' => 'edit', $concluidos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Concluidos', 'action' => 'delete', $concluidos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $concluidos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
