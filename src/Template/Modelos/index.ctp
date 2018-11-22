<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modelo[]|\Cake\Collection\CollectionInterface $modelos
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Modelo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passos'), ['controller' => 'Passos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passo'), ['controller' => 'Passos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<div class="modelos index large-12 columns content">
    <?= $this->Html->link('Novo Modelo', ['action' => 'add'],['class' =>'right']) ?>
    <?= $this->Html->image('icons/plus-square.svg',['class' => 'right', 'style' => 'margin-right: 0.5em;']) ?>
    <br/>
    <?= $this->Html->link(__('Cadastro de Passos'), ['controller' => 'Passos', 'action' => 'index'],['class' =>'right']) ?>
    <h3><?= __('Modelos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modelos as $modelo): ?>
            <tr>
                <td><?= $this->Number->format($modelo->id) ?></td>
                <td><?= h($modelo->nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $modelo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $modelo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $modelo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modelo->id)]) ?>
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
