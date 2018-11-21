<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Concluido[]|\Cake\Collection\CollectionInterface $concluidos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Concluido'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passos'), ['controller' => 'Passos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passo'), ['controller' => 'Passos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="concluidos index large-9 medium-8 columns content">
    <h3><?= __('Concluidos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projeto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('passo_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($concluidos as $concluido): ?>
            <tr>
                <td><?= $this->Number->format($concluido->id) ?></td>
                <td><?= h($concluido->data) ?></td>
                <td><?= $concluido->has('projeto') ? $this->Html->link($concluido->projeto->id, ['controller' => 'Projetos', 'action' => 'view', $concluido->projeto->id]) : '' ?></td>
                <td><?= $concluido->has('passo') ? $this->Html->link($concluido->passo->idpassos, ['controller' => 'Passos', 'action' => 'view', $concluido->passo->idpassos]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $concluido->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $concluido->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $concluido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $concluido->id)]) ?>
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
