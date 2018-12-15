<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Material[]|\Cake\Collection\CollectionInterface $materials
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('AÇÕES') ?></li>
        <li><?= $this->Html->link(__('New Material'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Compra Materials'), ['controller' => 'CompraMaterials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Compra Material'), ['controller' => 'CompraMaterials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Material Clientes'), ['controller' => 'MaterialClientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material Cliente'), ['controller' => 'MaterialClientes', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<div class="materials index large-12 medium-12 columns content">
    <?= $this->Html->link('Novo Material', ['action' => 'add'],['class' =>'right']) ?>
    <?= $this->Html->image('icons/plus-square.svg',['class' => 'right', 'style' => 'margin-right: 0.5em;']) ?>
    <h3><?= __('Materials') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('saldo_atual') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materials as $material): ?>
            <tr>
                <td><?= $this->Number->format($material->id) ?></td>
                <td><?= h($material->nome) ?></td>
                <td><?= h($material->descricao) ?></td>
                <td><?= $this->Number->format($material->saldo_atual) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $material->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $material->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $material->id], ['confirm' => __('Are you sure you want to delete # {0}?', $material->id)]) ?>
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
