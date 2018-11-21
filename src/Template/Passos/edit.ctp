<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Passo $passo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $passo->idpassos],
                ['confirm' => __('Are you sure you want to delete # {0}?', $passo->idpassos)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Passos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Modelos'), ['controller' => 'Modelos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Modelo'), ['controller' => 'Modelos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Concluidos'), ['controller' => 'Concluidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Concluido'), ['controller' => 'Concluidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="passos form large-9 medium-8 columns content">
    <?= $this->Form->create($passo) ?>
    <fieldset>
        <legend><?= __('Edit Passo') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('ordem');
            echo $this->Form->control('modelo_id', ['options' => $modelos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
