<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projeto[]|\Cake\Collection\CollectionInterface $projetos
 */
?>
<!--<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('AÇÕES') ?></li>
        <li><?= $this->Html->link(__('Criar Projeto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Concluidos'), ['controller' => 'Concluidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Concluido'), ['controller' => 'Concluidos', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<div class="projetos index large-12 medium-12 columns content">
    <?= $this->Html->link('Novo Projeto', ['action' => 'add'],['class' =>'right']) ?>
    <?= $this->Html->image('icons/plus-square.svg',['class' => 'right', 'style' => 'margin-right: 0.5em;']) ?>
    <h3><?= __('Projetos') ?></h3>
    <?php echo $this->Form->create(''); ?>
        <div class="row">
            <div class="small-9 columns">
                <input type="text" name="busca" class="form-control input-lg" placeholder="Buscar" 
                value="<?=(isset($busca)?$busca:'')?>" />
            </div>
            <div class="small-3 columns">
                <button class="btn btn-info" type="submit" style="margin-top:-3px">
                    VAI
                </button>
            </div>
        </div>
    <?php echo $this->Form->end(); ?>
    
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Modelos.nome','Projeto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Clientes.nome','Cliente') ?></th>
                <th scope="col"><?= $this->Paginator->sort('observacao') ?></th>
                <th scope="col">Progresso</th>
                <th scope="col">Último concluído</th>
                <!--<th scope="col"><?= $this->Paginator->sort('modelo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projetos as $projeto): ?>
            <tr>
                <td><?= $this->Number->format($projeto->id) ?></td>
                <td><?= $projeto->modelo->nome ?></td>
                <td><?= $this->Html->link($projeto->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $projeto->cliente->id]) ?></td>
                <td><?= h($projeto->observacao) ?></td>
                <td><progress value="<?= $projeto->totalConcluidos ?>" max="<?= $projeto->totalPassos ?>"></progress></td>
                <td><?= h($projeto->ultimaConcluida) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projeto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projeto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projeto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projeto->id)]) ?>
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
