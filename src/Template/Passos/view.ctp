<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Passo $passo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Passo'), ['action' => 'edit', $passo->idpassos]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Passo'), ['action' => 'delete', $passo->idpassos], ['confirm' => __('Are you sure you want to delete # {0}?', $passo->idpassos)]) ?> </li>
        <li><?= $this->Html->link(__('List Passos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Concluidos'), ['controller' => 'Concluidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Concluido'), ['controller' => 'Concluidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="passos view large-9 medium-8 columns content">
    <h3><?= h($passo->idpassos) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($passo->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modelo') ?></th>
            <td><?= $passo->has('modelo') ? $this->Html->link($passo->modelo->id, ['controller' => 'Modelos', 'action' => 'view', $passo->modelo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idpassos') ?></th>
            <td><?= $this->Number->format($passo->idpassos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ordem') ?></th>
            <td><?= $this->Number->format($passo->ordem) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Concluidos') ?></h4>
        <?php if (!empty($passo->concluidos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Data') ?></th>
                <th scope="col"><?= __('Projeto Id') ?></th>
                <th scope="col"><?= __('Passo Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($passo->concluidos as $concluidos): ?>
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
