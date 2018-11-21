<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Passo[]|\Cake\Collection\CollectionInterface $passos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Passo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Concluidos'), ['controller' => 'Concluidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Concluido'), ['controller' => 'Concluidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="passos index large-9 medium-8 columns content">
    <h3><?= __('Passos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idpassos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ordem') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modelo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($passos as $passo): ?>
            <tr>
                <td><?= $this->Number->format($passo->idpassos) ?></td>
                <td><?= h($passo->nome) ?></td>
                <td><?= $this->Number->format($passo->ordem) ?></td>
                <td><?= $passo->has('modelo') ? $this->Html->link($passo->modelo->nome, ['controller' => 'Modelos', 'action' => 'view', $passo->modelo->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $passo->idpassos]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $passo->idpassos]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $passo->idpassos], ['confirm' => __('Are you sure you want to delete # {0}?', $passo->idpassos)]) ?>
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
